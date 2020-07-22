<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The pricing scheme details.
 *
 * generated from: pricing_scheme.json
 */
class PricingScheme implements JsonSerializable
{
    use BaseModel;

    /** The pricing scheme change is in progress. */
    const STATUS_IN_PROGRESS = 'IN_PROGRESS';

    /** The pricing scheme change is active. */
    const STATUS_ACTIVE = 'ACTIVE';

    /** The pricing scheme is inactive. */
    const STATUS_INACTIVE = 'INACTIVE';

    /** A volume-tiered model. */
    const TIER_MODE_VOLUME = 'VOLUME';

    /** A graduated-tiered model. */
    const TIER_MODE_GRADUATED = 'GRADUATED';

    /**
     * @var integer
     * The version of the pricing scheme.
     */
    public $version;

    /**
     * @var string
     * The status of the pricing scheme.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_IN_PROGRESS
     * @see STATUS_ACTIVE
     * @see STATUS_INACTIVE
     * minLength: 1
     * maxLength: 24
     */
    public $status;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $fixed_price;

    /**
     * @var string
     * The pricing model for tiered plan. The `tiers` parameter is required.
     *
     * use one of constants defined in this class to set the value:
     * @see TIER_MODE_VOLUME
     * @see TIER_MODE_GRADUATED
     * minLength: 1
     * maxLength: 24
     */
    public $tier_mode;

    /**
     * @var array<PricingTier>
     * An array of pricing tiers which are used for billing volume/graduated plans. tier_mode field has to be
     * specified.
     */
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
     *
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $update_time;
}
