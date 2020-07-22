<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->starting_quantity) || Assert::minLength($this->starting_quantity, 1, "starting_quantity in PricingTier must have minlength of 1 $within");
        !isset($this->starting_quantity) || Assert::maxLength($this->starting_quantity, 32, "starting_quantity in PricingTier must have maxlength of 32 $within");
        !isset($this->ending_quantity) || Assert::minLength($this->ending_quantity, 1, "ending_quantity in PricingTier must have minlength of 1 $within");
        !isset($this->ending_quantity) || Assert::maxLength($this->ending_quantity, 32, "ending_quantity in PricingTier must have maxlength of 32 $within");
        !isset($this->amount) || Assert::notNull($this->amount->currency_code, "currency_code in amount must not be NULL within PricingTier $within");
        !isset($this->amount) || Assert::notNull($this->amount->value, "value in amount must not be NULL within PricingTier $within");
        !isset($this->amount) || Assert::isInstanceOf($this->amount, Money::class, "amount in PricingTier must be instance of Money $within");
        !isset($this->amount) || $this->amount->validate(PricingTier::class);
    }

    public function __construct()
    {
    }
}
