<?php

namespace OxidProfessionalServices\PayPal\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Throwable;

/**
 * Class Client
 *
 * 1. auth
 * 2. call APIs
 * 3. get results
 *
 */
class Client
{
    public const SANDBOX_URL            = "https://api.sandbox.paypal.com";
    public const PRODUCTION_URL         = "https://api.paypal.com";
    public const CONTENT_TYPE_JSON      = 'application/json';
    public const CONTENT_TYPE_X_WWW     = 'application/x-www-form-urlencoded';
    public const PAYPAL_PARTNER_ATTR_ID = 'Oxid_Cart_6Cart_Plus, Oxid_Cart_ECS_Shortcut, OXID_Cart_ProfessionalECS';
    public const PAYPAL_PARTNER_ATTR_ID_HEADER = 'PayPal-Partner-Attribution-Id';


    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * @var array
     */
    protected $tokenResponse;

    /**
     * @var string
     */
    private $merchantClientId;

    /**
     * @var string
     */
    private $merchantClientSecret;

    /**
     * @var string
     */
    private $merchantPayerId;

    /**
     * @var string
     */
    private $technicalClientId = "AS-lHBWs8cudxxonSeQ1eRbdn1Nr-7baqAURRNJnIuP-PPQFzFF1XkjDYV3NG3M6O75st2D98DOil4Vd";


    /**
     * Client constructor.
     * @param LoggerInterface $logger
     * @param string $endpoint
     * @param string $clientId
     * seller/merchant or partner ClientId depending on if it is a first party or a third party request
     * @param string $clientSecret
     * seller/merchant or partner clientSecret depending on if it is a first party or a third party
     * request. Usually you want to use the sellers credentials if they are available
     * @param string $payerId the technical oxid paypal account client id used as meta information in requests
     * @param bool $debug
     */
    public function __construct(
        LoggerInterface $logger,
        $endpoint,
        $clientId,
        $clientSecret,
        $payerId,
        $debug = false
    ) {
        $logger->info("creating client");
        $this->endpoint = $endpoint;
        $this->merchantClientId = $clientId;
        $this->merchantClientSecret = $clientSecret;
        $this->merchantPayerId = $payerId;
        $stack = HandlerStack::create();
        $stack->push(
            Middleware::log(
                $logger,
//                new MessageFormatter("{req_body} \n ----- ----- \n {res_body}")
                new MessageFormatter(MessageFormatter::DEBUG)
            )
        );
        $this->httpClient = new \GuzzleHttp\Client(
            [
                'handler' => $stack,
                'debug' => $debug
            ]
        );
    }

    /**
     * @param $method
     * @param $path
     * @param $header
     * @param $body
     * @return RequestInterface
     */
    public function createRequest($method, $path, $header, $body = null): RequestInterface
    {
        return new Request($method, $this->endpoint . $path, $header, $body);
    }

    /**
     * @param RequestInterface $request
     * @throws Throwable for now a GuzzleException but you should not rely on this the only commitment for this
     * exception object is that the method getCode() return the http result code if there is one.
     * @return ResponseInterface
     */
    public function send(RequestInterface $request)
    {
        try {
            $method = $request->getMethod();
            assert(
                (array_search($method, ['POST','PATCH','PUT','GET','DELETE']) !== false),
                "not valid http method '$method' for paypal client"
            );

            return $this->sendWithAuth($request);
        } catch (GuzzleException $e) {
            if ($e->getCode() === 401) {
                //clear tokens to force re-auth
                $this->tokenResponse = null;
                return $this->sendWithAuth($request);
            } else {
                throw $e;
            }
        }
    }


    public function setTechnicalClientId($clientId)
    {
        $this->technicalClientId = $clientId;
    }

    /**
     * normal auth if $clientId and $clientSecret are already available
     * @param $clientId
     * @param $clientSecret
     * @return $this
     */
    public function auth()
    {
        $clientId = $this->merchantClientId;
        $clientSecret = $this->merchantClientSecret;
        $authBase64 = base64_encode("$clientId:$clientSecret");
        $url = $this->endpoint . "/v1/oauth2/token";

        $res = $this->httpClient->post($url, [
            "headers" => [
                "Authorization" => "Basic $authBase64",
                "Content-Type" => self::CONTENT_TYPE_X_WWW,
                "Accept" => self::CONTENT_TYPE_JSON
            ],
            'form_params' => [
                "grant_type" => "client_credentials",
            ]
        ]);

        $this->tokenResponse = json_decode('' . $res->getBody(), true);

        return $this;
    }

    public function isAuthenticated()
    {
        return isset($this->tokenResponse['access_token']);
    }

    /**
     * @param $tokenResponse
     */
    public function injectTokenResponse($tokenResponse)
    {
        $this->tokenResponse = $tokenResponse;
    }

    /**
     * use this if you want to store the auth response for later reuse
     * see also injectTokenResponse
     * @return array the token response from the auth call
     */
    public function tokenResponse()
    {
        return $this->tokenResponse;
    }


    /**
     * @param RequestInterface $request
     * @return RequestInterface
     */
    protected function injectAuthHeaders(RequestInterface $request)
    {
        if (!$this->isAuthenticated()) {
            $this->auth();
        }

        $headers["Authorization"] = "Bearer " . $this->tokenResponse['access_token'];

        $jose_header = base64_encode('{"alg":"none"}');
        $payer_id = $this->merchantPayerId;


        $partnerClientId = $this->technicalClientId;
        $payload = base64_encode("{\"iss\": \"$partnerClientId\", \"payer_id\":\"$payer_id\"}");

        $headers['PayPal-Auth-Assertion'] = "{$jose_header}.{$payload}.";

        $headers[self::PAYPAL_PARTNER_ATTR_ID_HEADER] = self::PAYPAL_PARTNER_ATTR_ID;
        foreach ($headers as $headerName => $headerValue) {
            $request = $request->withHeader($headerName, $headerValue);
        }

        return $request;
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws GuzzleException
     */
    protected function sendWithAuth(RequestInterface $request)
    {
        $request = $this->injectAuthHeaders($request);
        $res = $this->httpClient->send($request);
        return $res;
    }
}
