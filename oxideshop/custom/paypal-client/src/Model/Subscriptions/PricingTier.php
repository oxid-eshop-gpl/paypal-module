<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The pricing tier details.
 *
 * generated from: pricing_tier.json
 */
class PricingTier implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The starting quantity for the tier.
     *
     * minLength: 1
     * maxLength: 32
     */
    public $starting_quantity;

    /**
     * @var string
     * The ending quantity for the tier. Optional for the last tier.
     *
     * minLength: 1
     * maxLength: 32
     */
    public $ending_quantity;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount;
}
