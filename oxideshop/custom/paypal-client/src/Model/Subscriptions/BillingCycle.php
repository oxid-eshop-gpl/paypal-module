<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The billing cycle details.
 *
 * generated from: billing_cycle.json
 */
class BillingCycle implements JsonSerializable
{
    use BaseModel;

    /**
     * @var PricingScheme
     * The pricing scheme details.
     */
    public $pricing_scheme;

    /**
     * @var Frequency
     * The frequency of the billing cycle.
     */
    public $frequency;

    /** @var string */
    public $tenure_type;

    /** @var integer */
    public $sequence;

    /** @var integer */
    public $total_cycles;
}
