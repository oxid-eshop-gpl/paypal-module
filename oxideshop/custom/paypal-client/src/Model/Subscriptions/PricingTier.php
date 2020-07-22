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

    /** @var string */
    public $starting_quantity;

    /** @var string */
    public $ending_quantity;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount;
}
