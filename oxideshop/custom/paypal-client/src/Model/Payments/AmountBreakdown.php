<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The breakdown of the amount. Breakdown provides details such as total item amount, total tax amount, shipping,
 * handling, insurance, and discounts, if any.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-amount_breakdown.json
 */
class AmountBreakdown implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $item_total;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $shipping;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $handling;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $tax_total;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $insurance;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $shipping_discount;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $discount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->item_total) || Assert::notNull($this->item_total->currency_code, "currency_code in item_total must not be NULL within AmountBreakdown $within");
        !isset($this->item_total) || Assert::notNull($this->item_total->value, "value in item_total must not be NULL within AmountBreakdown $within");
        !isset($this->item_total) || Assert::isInstanceOf($this->item_total, Money::class, "item_total in AmountBreakdown must be instance of Money $within");
        !isset($this->item_total) || $this->item_total->validate(AmountBreakdown::class);
        !isset($this->shipping) || Assert::notNull($this->shipping->currency_code, "currency_code in shipping must not be NULL within AmountBreakdown $within");
        !isset($this->shipping) || Assert::notNull($this->shipping->value, "value in shipping must not be NULL within AmountBreakdown $within");
        !isset($this->shipping) || Assert::isInstanceOf($this->shipping, Money::class, "shipping in AmountBreakdown must be instance of Money $within");
        !isset($this->shipping) || $this->shipping->validate(AmountBreakdown::class);
        !isset($this->handling) || Assert::notNull($this->handling->currency_code, "currency_code in handling must not be NULL within AmountBreakdown $within");
        !isset($this->handling) || Assert::notNull($this->handling->value, "value in handling must not be NULL within AmountBreakdown $within");
        !isset($this->handling) || Assert::isInstanceOf($this->handling, Money::class, "handling in AmountBreakdown must be instance of Money $within");
        !isset($this->handling) || $this->handling->validate(AmountBreakdown::class);
        !isset($this->tax_total) || Assert::notNull($this->tax_total->currency_code, "currency_code in tax_total must not be NULL within AmountBreakdown $within");
        !isset($this->tax_total) || Assert::notNull($this->tax_total->value, "value in tax_total must not be NULL within AmountBreakdown $within");
        !isset($this->tax_total) || Assert::isInstanceOf($this->tax_total, Money::class, "tax_total in AmountBreakdown must be instance of Money $within");
        !isset($this->tax_total) || $this->tax_total->validate(AmountBreakdown::class);
        !isset($this->insurance) || Assert::notNull($this->insurance->currency_code, "currency_code in insurance must not be NULL within AmountBreakdown $within");
        !isset($this->insurance) || Assert::notNull($this->insurance->value, "value in insurance must not be NULL within AmountBreakdown $within");
        !isset($this->insurance) || Assert::isInstanceOf($this->insurance, Money::class, "insurance in AmountBreakdown must be instance of Money $within");
        !isset($this->insurance) || $this->insurance->validate(AmountBreakdown::class);
        !isset($this->shipping_discount) || Assert::notNull($this->shipping_discount->currency_code, "currency_code in shipping_discount must not be NULL within AmountBreakdown $within");
        !isset($this->shipping_discount) || Assert::notNull($this->shipping_discount->value, "value in shipping_discount must not be NULL within AmountBreakdown $within");
        !isset($this->shipping_discount) || Assert::isInstanceOf($this->shipping_discount, Money::class, "shipping_discount in AmountBreakdown must be instance of Money $within");
        !isset($this->shipping_discount) || $this->shipping_discount->validate(AmountBreakdown::class);
        !isset($this->discount) || Assert::notNull($this->discount->currency_code, "currency_code in discount must not be NULL within AmountBreakdown $within");
        !isset($this->discount) || Assert::notNull($this->discount->value, "value in discount must not be NULL within AmountBreakdown $within");
        !isset($this->discount) || Assert::isInstanceOf($this->discount, Money::class, "discount in AmountBreakdown must be instance of Money $within");
        !isset($this->discount) || $this->discount->validate(AmountBreakdown::class);
    }

    public function __construct()
    {
    }
}
