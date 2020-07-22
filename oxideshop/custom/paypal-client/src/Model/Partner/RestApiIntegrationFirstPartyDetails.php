<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The integration details for PayPal first party REST endpoints.
 *
 * generated from: RestApiIntegration_first_party_details
 */
class RestApiIntegrationFirstPartyDetails implements JsonSerializable
{
    use BaseModel;

    /** @var array<string> */
    public $features;

    /** @var string */
    public $seller_nonce;
}
