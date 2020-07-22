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

    /** @var string */
    public $integration_method;

    /** @var string */
    public $integration_type;

    /** @var RestApiIntegrationFirstPartyDetails */
    public $first_party_details;

    /** @var RestApiIntegrationThirdPartyDetails */
    public $third_party_details;
}
