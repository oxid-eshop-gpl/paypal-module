<?php

namespace OxidProfessionalServices\PayPal\Api;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Psr\Log\LoggerInterface;
use ReallySimpleJWT\Token;

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

    /**
     * @var string
     */
    private $endpoint;

    /**
     * @var \GuzzleHttp\Client
     */
    private $httpClient;

    /**
     * @var
     */
    private $tokenResponse;

    /**
     * Client constructor.
     * @param LoggerInterface $logger
     * @param string $endpoint
     * @param bool $debug
     */
    public function __construct(LoggerInterface $logger, $endpoint, $debug = false)
    {
        $logger->info("creating client");

        $this->endpoint = $endpoint;
        $stack = HandlerStack::create();
        $stack->push(
            Middleware::log(
                $logger,
                new MessageFormatter('{req_body} - {res_body}')
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
     * Auth after seller used on browser to login into the paypal account
     * the parameters are usually provided in a callback on client side e.g.:
     * <script>
     * function onboardedCallback(authCode, sharedId) {
     * // post data to the server side post(authCode, sharedId)
     * }
     * </script>
     * @param $authCode string this is returned by paypal in the call back function
     * @param $sharedId string this is returned by paypal in the call back function
     * @param $sellerNonce string the random number that was used to generate the paypal register/login link
     */
    public function authAfterWebLogin($authCode, $sharedId, $sellerNonce)
    {
        //fixme: test this by using register link and callback see 2.1.3.1 in paypal sdd 1.0
        $authBase64 = base64_encode("$sharedId:");
        $client = $this->httpClient;
        $url = $this->endpoint . "/v1/oauth2/token";

        $res = $client->post($url, [
            "headers" => [
                "Authorization" => "Bearer $authBase64",
                "Content-Type" => self::CONTENT_TYPE_JSON,
                "PayPal-Partner-Attribution-Id" => self::PAYPAL_PARTNER_ATTR_ID,
                "Accept" => self::CONTENT_TYPE_JSON
            ],
            'form_params' => [
                "grant_type" => "authorization_code",
                "code" => $authCode,
                "code_verifier" => $sellerNonce,
            ]
        ]);

        $this->tokenResponse = json_decode($res, true);
    }

    /**
     * normal auth if $clientId and $clientSecret are already available
     * @param $clientId
     * @param $clientSecret
     * @return $this
     */
    public function auth($clientId, $clientSecret)
    {
        $authBase64 = base64_encode("$clientId:$clientSecret");
        $client = $this->httpClient;
        $url = $this->endpoint . "/v1/oauth2/token";

        $res = $client->post($url, [
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

    public function isAuthenticated() {
        return isset($this->tokenResponse['access_token']);
    }
}
