<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The integration details for PayPal REST endpoints.
 *
 * generated from: referral_data-rest_api_integration.json
 */
class RestApiIntegration implements JsonSerializable
{
    use BaseModel;

    /** Braintree integration method. */
    const INTEGRATION_METHOD_BRAINTREE = 'BRAINTREE';

    /** PayPal integration method. */
    const INTEGRATION_METHOD_PAYPAL = 'PAYPAL';

    /** A first-party integration. */
    const INTEGRATION_TYPE_FIRST_PARTY = 'FIRST_PARTY';

    /** A third-party integration. */
    const INTEGRATION_TYPE_THIRD_PARTY = 'THIRD_PARTY';

    /**
     * @var string
     * The REST-credential integration method.
     *
     * use one of constants defined in this class to set the value:
     * @see INTEGRATION_METHOD_BRAINTREE
     * @see INTEGRATION_METHOD_PAYPAL
     * minLength: 1
     * maxLength: 255
     */
    public $integration_method = 'PAYPAL';

    /**
     * @var string
     * The type of REST-endpoint integration. To integrate with Braintree v.zero for PayPal REST endpoints, specify
     * `third_party_details`.
     *
     * use one of constants defined in this class to set the value:
     * @see INTEGRATION_TYPE_FIRST_PARTY
     * @see INTEGRATION_TYPE_THIRD_PARTY
     * minLength: 1
     * maxLength: 255
     */
    public $integration_type;

    /**
     * @var RestApiIntegrationFirstPartyDetails
     * The integration details for PayPal first party REST endpoints.
     */
    public $first_party_details;

    /**
     * @var RestApiIntegrationThirdPartyDetails
     * The integration details for PayPal REST endpoints.
     */
    public $third_party_details;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->integration_method) || Assert::minLength($this->integration_method, 1, "integration_method in RestApiIntegration must have minlength of 1 $within");
        !isset($this->integration_method) || Assert::maxLength($this->integration_method, 255, "integration_method in RestApiIntegration must have maxlength of 255 $within");
        !isset($this->integration_type) || Assert::minLength($this->integration_type, 1, "integration_type in RestApiIntegration must have minlength of 1 $within");
        !isset($this->integration_type) || Assert::maxLength($this->integration_type, 255, "integration_type in RestApiIntegration must have maxlength of 255 $within");
        !isset($this->first_party_details) || Assert::isInstanceOf($this->first_party_details, RestApiIntegrationFirstPartyDetails::class, "first_party_details in RestApiIntegration must be instance of RestApiIntegrationFirstPartyDetails $within");
        !isset($this->first_party_details) || $this->first_party_details->validate(RestApiIntegration::class);
        !isset($this->third_party_details) || Assert::isInstanceOf($this->third_party_details, RestApiIntegrationThirdPartyDetails::class, "third_party_details in RestApiIntegration must be instance of RestApiIntegrationThirdPartyDetails $within");
        !isset($this->third_party_details) || $this->third_party_details->validate(RestApiIntegration::class);
    }

    public function __construct()
    {
    }
}
