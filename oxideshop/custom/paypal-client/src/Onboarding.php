<?php


namespace OxidProfessionalServices\PayPal\Api;


use Psr\Log\LoggerInterface;

class Onboarding extends Client
{
    /**
     * @var array
     */
    protected $signupLinkResponse;

    /**
     * during onboarding you do not have shop owners credentials
     * so you initialize the client with the technical oxid account credentials
     * Onboarding constructor.
     * @param LoggerInterface $logger
     * @param $endpoint string the base API url
     * @param $oxidClientId string the client id from the technical oxid account
     * @param $oxidClientSecret string the client secret from the technical oxid account
     * @param $oxidPartnerId string Not sure if needed for any onboarding related request
     * @param bool $debug set to true to debug request sent to paypal on the console
     */
    public function __construct(
        LoggerInterface $logger,
        $endpoint,
        $oxidClientId,
        $oxidClientSecret,
        $oxidPartnerId,
        $debug = false
    ) {
        parent::__construct($logger, $endpoint, $oxidClientId, $oxidClientSecret, $oxidPartnerId, $debug);
    }

    /**
     * Generate a PayPal sign-up link
     * to include onboarding sellers with PayPal.
     * @param $authCode string this is returned by paypal in the call back function
     * @param $sellerNonce string the random number that was used to generate the paypal register/login link
     */
    public function generateSignupLink($authCode, $sellerNonce)
    {
        $client = $this->httpClient;
        $url = $this->endpoint . "/v2/customer/partner-referrals";

        $res = $client->post($url, [
            "headers" => [
                "Authorization" => "Bearer $authCode",
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
        $this->setSignupLinkResponse(json_decode('' . $res->getBody(), true));
    }

    /**
     * use this if you want to inject a token into the auth headers set by this client.
     * You may want to use this with the return from getTokenResponse() so you are able to cache the
     * the auth between requests.
     * @param $tokenResponse
     */
    public function setSignupLinkResponse($signupLinkResponse)
    {
        $this->signupLinkResponse = $signupLinkResponse;
    }

    /**
     * use this if you want to store the auth response for later reuse
     * see also setSignupLinkResponse
     * @return array the token response from the auth call
     */
    public function getSignupLinkResponse()
    {
        return $this->signupLinkResponse;
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

        foreach ($this->getSignupLinkResponse()['links'] as $signupLinkData) {
            if ($signupLinkData["rel"] == "action_url") {
                $signupLink = $signupLinkData["href"];
                break;
            }
        }
        return $signupLink;
    }

    //TODO: add create paypal link function

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

        $this->tokenResponse = json_decode('' . $res->getBody(), true);
    }


}