<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The integration details for PayPal REST endpoints.
 */
class RestApiIntegrationThirdPartyDetails implements JsonSerializable
{
    use BaseModel;

    /** @var array<string> */
    public $features;
}
