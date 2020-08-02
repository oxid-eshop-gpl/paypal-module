<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use OxidProfessionalServices\PayPal\Api\Model\CommonV3\CommonV3Money;
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
     * @var CommonV3Money | null
     */
    public $item_total;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var CommonV3Money | null
     */
    public $shipping;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var CommonV3Money | null
     */
    public $handling;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var CommonV3Money | null
     */
    public $tax_total;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var CommonV3Money | null
     */
    public $insurance;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var CommonV3Money | null
     */
    public $shipping_discount;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var CommonV3Money | null
     */
    public $discount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->item_total) || Assert::isInstanceOf(
            $this->item_total,
            CommonV3Money::class,
            "item_total in AmountBreakdown must be instance of CommonV3Money $within"
        );
        !isset($this->item_total) ||  $this->item_total->validate(AmountBreakdown::class);
        !isset($this->shipping) || Assert::isInstanceOf(
            $this->shipping,
            CommonV3Money::class,
            "shipping in AmountBreakdown must be instance of CommonV3Money $within"
        );
        !isset($this->shipping) ||  $this->shipping->validate(AmountBreakdown::class);
        !isset($this->handling) || Assert::isInstanceOf(
            $this->handling,
            CommonV3Money::class,
            "handling in AmountBreakdown must be instance of CommonV3Money $within"
        );
        !isset($this->handling) ||  $this->handling->validate(AmountBreakdown::class);
        !isset($this->tax_total) || Assert::isInstanceOf(
            $this->tax_total,
            CommonV3Money::class,
            "tax_total in AmountBreakdown must be instance of CommonV3Money $within"
        );
        !isset($this->tax_total) ||  $this->tax_total->validate(AmountBreakdown::class);
        !isset($this->insurance) || Assert::isInstanceOf(
            $this->insurance,
            CommonV3Money::class,
            "insurance in AmountBreakdown must be instance of CommonV3Money $within"
        );
        !isset($this->insurance) ||  $this->insurance->validate(AmountBreakdown::class);
        !isset($this->shipping_discount) || Assert::isInstanceOf(
            $this->shipping_discount,
            CommonV3Money::class,
            "shipping_discount in AmountBreakdown must be instance of CommonV3Money $within"
        );
        !isset($this->shipping_discount) ||  $this->shipping_discount->validate(AmountBreakdown::class);
        !isset($this->discount) || Assert::isInstanceOf(
            $this->discount,
            CommonV3Money::class,
            "discount in AmountBreakdown must be instance of CommonV3Money $within"
        );
        !isset($this->discount) ||  $this->discount->validate(AmountBreakdown::class);
    }

    private function map(array $data)
    {
        if (isset($data['item_total'])) {
            $this->item_total = new CommonV3Money($data['item_total']);
        }
        if (isset($data['shipping'])) {
            $this->shipping = new CommonV3Money($data['shipping']);
        }
        if (isset($data['handling'])) {
            $this->handling = new CommonV3Money($data['handling']);
        }
        if (isset($data['tax_total'])) {
            $this->tax_total = new CommonV3Money($data['tax_total']);
        }
        if (isset($data['insurance'])) {
            $this->insurance = new CommonV3Money($data['insurance']);
        }
        if (isset($data['shipping_discount'])) {
            $this->shipping_discount = new CommonV3Money($data['shipping_discount']);
        }
        if (isset($data['discount'])) {
            $this->discount = new CommonV3Money($data['discount']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
