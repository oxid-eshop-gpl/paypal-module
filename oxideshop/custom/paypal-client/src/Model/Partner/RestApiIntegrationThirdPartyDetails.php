<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The integration details for PayPal REST endpoints.
 *
 * generated from: RestApiIntegration_third_party_details
 */
class RestApiIntegrationThirdPartyDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * @var array<string>
     * An array of features that partner can access, or use, in PayPal on behalf of the seller. The seller grants
     * permission for these features to the partner.
     */
    public $features;
}
