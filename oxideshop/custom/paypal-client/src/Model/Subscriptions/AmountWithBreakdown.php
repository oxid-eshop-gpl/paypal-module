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
     */
    public $net_amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->gross_amount) || Assert::notNull($this->gross_amount->currency_code, "currency_code in gross_amount must not be NULL within AmountWithBreakdown $within");
        !isset($this->gross_amount) || Assert::notNull($this->gross_amount->value, "value in gross_amount must not be NULL within AmountWithBreakdown $within");
        !isset($this->gross_amount) || Assert::isInstanceOf($this->gross_amount, Money::class, "gross_amount in AmountWithBreakdown must be instance of Money $within");
        !isset($this->gross_amount) || $this->gross_amount->validate(AmountWithBreakdown::class);
        !isset($this->fee_amount) || Assert::notNull($this->fee_amount->currency_code, "currency_code in fee_amount must not be NULL within AmountWithBreakdown $within");
        !isset($this->fee_amount) || Assert::notNull($this->fee_amount->value, "value in fee_amount must not be NULL within AmountWithBreakdown $within");
        !isset($this->fee_amount) || Assert::isInstanceOf($this->fee_amount, Money::class, "fee_amount in AmountWithBreakdown must be instance of Money $within");
        !isset($this->fee_amount) || $this->fee_amount->validate(AmountWithBreakdown::class);
        !isset($this->shipping_amount) || Assert::notNull($this->shipping_amount->currency_code, "currency_code in shipping_amount must not be NULL within AmountWithBreakdown $within");
        !isset($this->shipping_amount) || Assert::notNull($this->shipping_amount->value, "value in shipping_amount must not be NULL within AmountWithBreakdown $within");
        !isset($this->shipping_amount) || Assert::isInstanceOf($this->shipping_amount, Money::class, "shipping_amount in AmountWithBreakdown must be instance of Money $within");
        !isset($this->shipping_amount) || $this->shipping_amount->validate(AmountWithBreakdown::class);
        !isset($this->tax_amount) || Assert::notNull($this->tax_amount->currency_code, "currency_code in tax_amount must not be NULL within AmountWithBreakdown $within");
        !isset($this->tax_amount) || Assert::notNull($this->tax_amount->value, "value in tax_amount must not be NULL within AmountWithBreakdown $within");
        !isset($this->tax_amount) || Assert::isInstanceOf($this->tax_amount, Money::class, "tax_amount in AmountWithBreakdown must be instance of Money $within");
        !isset($this->tax_amount) || $this->tax_amount->validate(AmountWithBreakdown::class);
        !isset($this->net_amount) || Assert::notNull($this->net_amount->currency_code, "currency_code in net_amount must not be NULL within AmountWithBreakdown $within");
        !isset($this->net_amount) || Assert::notNull($this->net_amount->value, "value in net_amount must not be NULL within AmountWithBreakdown $within");
        !isset($this->net_amount) || Assert::isInstanceOf($this->net_amount, Money::class, "net_amount in AmountWithBreakdown must be instance of Money $within");
        !isset($this->net_amount) || $this->net_amount->validate(AmountWithBreakdown::class);
    }

    public function __construct()
    {
    }
}
