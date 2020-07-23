<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The breakdown of the amount. Breakdown provides details such as total item amount, total tax amount, shipping,
 * handling, insurance, and discounts, if any.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-amount_breakdown.json
 */
class AmountBreakdown implements JsonSerializable
{
    use BaseModel;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $item_total;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $shipping;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $handling;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $tax_total;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $insurance;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $shipping_discount;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $discount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->item_total) || Assert::isInstanceOf(
            $this->item_total,
            Money::class,
            "item_total in AmountBreakdown must be instance of Money $within"
        );
        !isset($this->item_total) ||  $this->item_total->validate(AmountBreakdown::class);
        !isset($this->shipping) || Assert::isInstanceOf(
            $this->shipping,
            Money::class,
            "shipping in AmountBreakdown must be instance of Money $within"
        );
        !isset($this->shipping) ||  $this->shipping->validate(AmountBreakdown::class);
        !isset($this->handling) || Assert::isInstanceOf(
            $this->handling,
            Money::class,
            "handling in AmountBreakdown must be instance of Money $within"
        );
        !isset($this->handling) ||  $this->handling->validate(AmountBreakdown::class);
        !isset($this->tax_total) || Assert::isInstanceOf(
            $this->tax_total,
            Money::class,
            "tax_total in AmountBreakdown must be instance of Money $within"
        );
        !isset($this->tax_total) ||  $this->tax_total->validate(AmountBreakdown::class);
        !isset($this->insurance) || Assert::isInstanceOf(
            $this->insurance,
            Money::class,
            "insurance in AmountBreakdown must be instance of Money $within"
        );
        !isset($this->insurance) ||  $this->insurance->validate(AmountBreakdown::class);
        !isset($this->shipping_discount) || Assert::isInstanceOf(
            $this->shipping_discount,
            Money::class,
            "shipping_discount in AmountBreakdown must be instance of Money $within"
        );
        !isset($this->shipping_discount) ||  $this->shipping_discount->validate(AmountBreakdown::class);
        !isset($this->discount) || Assert::isInstanceOf(
            $this->discount,
            Money::class,
            "discount in AmountBreakdown must be instance of Money $within"
        );
        !isset($this->discount) ||  $this->discount->validate(AmountBreakdown::class);
    }

    public function __construct()
    {
    }
}
