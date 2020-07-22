<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The breakdown details for the amount. Includes the gross, tax, fee, and shipping amounts.
 *
 * generated from: amount_with_breakdown.json
 */
class AmountWithBreakdown implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * this is mandatory to be set
     */
    public $gross_amount;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $fee_amount;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $shipping_amount;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $tax_amount;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * this is mandatory to be set
     */
    public $net_amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->gross_amount, "gross_amount in AmountWithBreakdown must not be NULL $within");
         Assert::isInstanceOf($this->gross_amount, Money::class, "gross_amount in AmountWithBreakdown must be instance of Money $within");
         $this->gross_amount->validate(AmountWithBreakdown::class);
        !isset($this->fee_amount) || Assert::isInstanceOf($this->fee_amount, Money::class, "fee_amount in AmountWithBreakdown must be instance of Money $within");
        !isset($this->fee_amount) || $this->fee_amount->validate(AmountWithBreakdown::class);
        !isset($this->shipping_amount) || Assert::isInstanceOf($this->shipping_amount, Money::class, "shipping_amount in AmountWithBreakdown must be instance of Money $within");
        !isset($this->shipping_amount) || $this->shipping_amount->validate(AmountWithBreakdown::class);
        !isset($this->tax_amount) || Assert::isInstanceOf($this->tax_amount, Money::class, "tax_amount in AmountWithBreakdown must be instance of Money $within");
        !isset($this->tax_amount) || $this->tax_amount->validate(AmountWithBreakdown::class);
        Assert::notNull($this->net_amount, "net_amount in AmountWithBreakdown must not be NULL $within");
         Assert::isInstanceOf($this->net_amount, Money::class, "net_amount in AmountWithBreakdown must be instance of Money $within");
         $this->net_amount->validate(AmountWithBreakdown::class);
    }

    public function __construct()
    {
    }
}
