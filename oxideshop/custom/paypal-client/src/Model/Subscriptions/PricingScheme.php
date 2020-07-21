<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The pricing scheme details.
 */
class PricingScheme implements JsonSerializable
{
    use BaseModel;

    /** @var integer */
    public $version;

    /** @var string */
    public $status;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $fixed_price;

    /** @var string */
    public $tier_mode;

    /** @var array<PricingTier> */
    public $tiers;

    /**
     * @var RollOutStrategy
     * The roll-out strategy for a pricing scheme update. After the pricing update, all new subscriptions are based
     * on this pricing scheme and the values in this object determine the behavior for the existing subscriptions.
     */
    public $roll_out_strategy;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $create_time;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $update_time;
}
