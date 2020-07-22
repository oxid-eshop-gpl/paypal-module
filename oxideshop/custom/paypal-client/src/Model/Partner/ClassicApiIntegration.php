<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The integration details for PayPal CLASSIC endpoints.
 *
 * generated from: referral_data-classic_api_integration.json
 */
class ClassicApiIntegration implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $integration_type;

    /** @var ClassicApiIntegrationThirdPartyDetails */
    public $third_party_details;

    /** @var string */
    public $first_party_details;
}
