<?php

namespace OxidProfessionalServices\PayPal\Api\Exception;

use GuzzleHttp\Exception\BadResponseException;
use Throwable;

class ApiException extends \Exception
{
    public function __construct(BadResponseException $e)
    {
        $code = $e->getCode();
        $message = $e->getRequest()->getUri() . " returned bad status code $code.";
        $error = json_decode($e->getResponse()->getBody(), true);
        $details = $error['details'];
        $message .= "\n" . $error['message'];
        $message .= "\n Details: \n" . yaml_emit($details);

        parent::__construct($message, $code);
    }

}
