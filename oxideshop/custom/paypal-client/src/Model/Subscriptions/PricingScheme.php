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

    /** @var Money */
    public $fixed_price;

    /** @var string */
    public $tier_mode;

    /** @var array<PricingTier> */
    public $tiers;

    /** @var RollOutStrategy */
    public $roll_out_strategy;

    /** @var string */
    public $create_time;

    /** @var string */
    public $update_time;
}
