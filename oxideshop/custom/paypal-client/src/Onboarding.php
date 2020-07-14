<?php


namespace OxidProfessionalServices\PayPal\Api;


use Psr\Log\LoggerInterface;

class Onboarding extends Client
{
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

        $this->tokenResponse = json_decode($res, true);
    }


}