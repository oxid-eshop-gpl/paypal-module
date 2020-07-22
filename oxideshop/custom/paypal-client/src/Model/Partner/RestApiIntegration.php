<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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
     */
    public $integration_method;

    /**
     * @var string
     * The type of REST-endpoint integration. To integrate with Braintree v.zero for PayPal REST endpoints, specify
     * `third_party_details`.
     *
     * use one of constants defined in this class to set the value:
     * @see INTEGRATION_TYPE_FIRST_PARTY
     * @see INTEGRATION_TYPE_THIRD_PARTY
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
}