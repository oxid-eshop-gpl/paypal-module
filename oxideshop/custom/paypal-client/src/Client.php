<?php

namespace OxidProfessionalServices\PayPal\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Psr\Log\LoggerInterface;

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
     * @var
     */
    private $signupLinkResponse;

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

    public function createRequest($method, $path, $header, $body): RequestInterface
    {
        if (array_search($method, ['POST','PATCH','PUT','GET','DELETE']) === false) {
            die("not valid http method '$method' for paypal client");
        }

        if (!$this->isAuthenticated()) {
            $this->auth();
        }

        $header["Authorization"] = "Bearer " . $this->tokenResponse['access_token'];

        $jose_header = base64_encode('{"alg":"none"}');
        $partnerClientId = $this->merchantClientId;
        $payer_id = $this->merchantPayerId;

        $payload = base64_encode("{\"iss\": \"$partnerClientId\", \"payer_id\":\"$payer_id\"}");
        $header['PayPal-Auth-Assertion'] = "{$jose_header}.{$payload}.";

        $header[self::PAYPAL_PARTNER_ATTR_ID_HEADER] = self::PAYPAL_PARTNER_ATTR_ID;

        return new Request($method, $this->endpoint . $path, $header, $body);
    }

    protected function send(RequestInterface $request)
    {
        try {
            $this->httpClient->send($request);
        } catch (GuzzleException $e) {
            //fixme: handle 401
            throw $e;
        }
    }


    /**
     * Generate a PayPal sign-up link
     * to include onboarding sellers with PayPal.
     * @param $authCode string this is returned by paypal in the call back function
     * @param $sellerNonce string the random number that was used to generate the paypal register/login link
     */
    public function generateSignupLink($authCode, $sellerNonce)
    {
        $authBase64 = base64_encode("$sharedId:");
        $client = $this->httpClient;
        $url = $this->endpoint . "/v2/customer/partner-referrals";

        $res = $client->post($url, [
            "headers" => [
                "Authorization" => "Bearer $authBase64",
                "Content-Type" => self::CONTENT_TYPE_JSON,
                "Accept" => self::CONTENT_TYPE_JSON
            ],
            "operations" => [
                "operation" => "API_INTEGRATION",
                "api_integration_preference" => [
                    "rest_api_integration" => [
                        "integration_method"  => "PAYPAL",
                        "integration_type"    => "FIRST_PARTY",
                        "first_party_details" => [
                            "features" => [
                                "PAYMENT",
                                "REFUND"
                            ],
                            "seller_nonce" => $sellerNonce
                        ]
                    ]
                ]
            ],
            "products" => [
                "EXPRESS_CHECKOUT"
            ],
            "legal_consents" => [
                [
                    "type"    => "SHARE_DATA_CONSENT",
                    "granted" => true
                ]
            ]
        ]);

        $this->signupLinkResponse = json_decode($res, true);
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
     * @return bool|string
     */
    public function getAccessToken()
    {
        if(!$this->isAuthenticated()) {
            return false;
        }

        return $this->tokenResponse['access_token'];
    }

    /**
     * @return bool|string
     */
    public function getSignupLink()
    {
        if(!$this->isAuthenticated()) {
            return false;
        }

        $signupLink = "";

        foreach ($this->signupLinkResponse as $signupLinkData) {
            if ($signupLinkData["rel"] == "action_url") {
                $signupLink = $signupLinkData["href"];
                break;
            }
        }
        return $signupLink;
    }
}
