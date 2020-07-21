<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The billing cycle details.
 */
class BillingCycle implements \JsonSerializable
{
    use BaseModel;

    /** @var PricingScheme */
    public $pricing_scheme;

    /** @var Frequency */
    public $frequency;

    /** @var string */
    public $tenure_type;

    /** @var integer */
    public $sequence;

    /** @var integer */
    public $total_cycles;
}
