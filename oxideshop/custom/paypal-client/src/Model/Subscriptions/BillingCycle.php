<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The billing cycle details.
 */
class BillingCycle implements \JsonSerializable
{
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

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
