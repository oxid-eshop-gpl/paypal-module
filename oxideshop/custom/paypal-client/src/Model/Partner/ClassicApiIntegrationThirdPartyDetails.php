<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details of a classic third-party integration. If you have API credentials with which to call the API on
 * the customer's behalf, specify details in this field. The signup and setup flow asks that the seller grant the
 * required permissions to the partner.
 */
class ClassicApiIntegrationThirdPartyDetails implements JsonSerializable
{
    use BaseModel;

    /** @var array<string> */
    public $permissions;
}
