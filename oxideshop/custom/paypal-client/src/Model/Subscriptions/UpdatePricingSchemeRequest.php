<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The update pricing scheme request details.
 */
class UpdatePricingSchemeRequest implements JsonSerializable
{
    use BaseModel;

    /** @var integer */
    public $billing_cycle_sequence;

    /** @var PricingScheme */
    public $pricing_scheme;
}
