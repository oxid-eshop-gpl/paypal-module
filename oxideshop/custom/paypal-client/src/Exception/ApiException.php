<?php

namespace OxidProfessionalServices\PayPal\Api\Exception;

use GuzzleHttp\Exception\GuzzleException;

class ApiException extends \Exception
{
    private $request;
    private $response;

    public function __construct(GuzzleException $e)
    {
        $code = $e->getCode();
        $this->request = $e->getRequest();
        $this->response = $e->getResponse();
        $phrase = $this->response->getReasonPhrase();
        $message = $e->getRequest()->getMethod() . ' ' . $e->getRequest()->getUri() . " returned: $code $phrase";
        $error = json_decode($e->getResponse()->getBody(), true);
        if ($error) {
            if (isset($error['message'])) {
                $message .= "\nReturned Message: " . $error['message'];
            }
            if (isset($error['details'])) {
                $details = $error['details'];
                $message .= "\nError Details: \n" . json_encode($details) . "\n";
                unset($error['details']);
            }
            unset($error['message']);
            $message .= "\nResponse: \n" . json_encode($error) . "\n";
        }


        $message .= "\nThe following curl request could be used to simulate a similar request:
        \ncurl -v -X " . $this->request->getMethod() . ' "' . $this->request->getUri() . '"';
        foreach ($this->request->getHeaders() as $headerName => $headerValue) {
            $message .= " -H \"$headerName: " . join(",", $headerValue) . '"';
        }
        if ($this->request->getBody() . "") {
            $message .= " -d " . $this->request->getBody();
        }
        parent::__construct($message, $code);
    }

    /**
     * Checks whether the user should see the exception
     *
     * @return bool
     */
    public function isUserVisible(): bool
    {
        return true;
    }

    /**
     * Get description for user display
     *
     * @return string
     */
    public function getUserDescription(): string
    {
        return 'test';
    }
}
