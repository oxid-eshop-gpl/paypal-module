<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use OxidProfessionalServices\PayPal\Api\Model\CommonV3\CommonV3Money;
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
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var CommonV3Money
     */
    public $gross_amount;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var CommonV3Money | null
     */
    public $fee_amount;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var CommonV3Money | null
     */
    public $shipping_amount;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var CommonV3Money | null
     */
    public $tax_amount;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var CommonV3Money
     */
    public $net_amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->gross_amount, "gross_amount in AmountWithBreakdown must not be NULL $within");
        Assert::isInstanceOf(
            $this->gross_amount,
            CommonV3Money::class,
            "gross_amount in AmountWithBreakdown must be instance of CommonV3Money $within"
        );
         $this->gross_amount->validate(AmountWithBreakdown::class);
        !isset($this->fee_amount) || Assert::isInstanceOf(
            $this->fee_amount,
            CommonV3Money::class,
            "fee_amount in AmountWithBreakdown must be instance of CommonV3Money $within"
        );
        !isset($this->fee_amount) ||  $this->fee_amount->validate(AmountWithBreakdown::class);
        !isset($this->shipping_amount) || Assert::isInstanceOf(
            $this->shipping_amount,
            CommonV3Money::class,
            "shipping_amount in AmountWithBreakdown must be instance of CommonV3Money $within"
        );
        !isset($this->shipping_amount) ||  $this->shipping_amount->validate(AmountWithBreakdown::class);
        !isset($this->tax_amount) || Assert::isInstanceOf(
            $this->tax_amount,
            CommonV3Money::class,
            "tax_amount in AmountWithBreakdown must be instance of CommonV3Money $within"
        );
        !isset($this->tax_amount) ||  $this->tax_amount->validate(AmountWithBreakdown::class);
        Assert::notNull($this->net_amount, "net_amount in AmountWithBreakdown must not be NULL $within");
        Assert::isInstanceOf(
            $this->net_amount,
            CommonV3Money::class,
            "net_amount in AmountWithBreakdown must be instance of CommonV3Money $within"
        );
         $this->net_amount->validate(AmountWithBreakdown::class);
    }

    private function map(array $data)
    {
        if (isset($data['gross_amount'])) {
            $this->gross_amount = new CommonV3Money($data['gross_amount']);
        }
        if (isset($data['fee_amount'])) {
            $this->fee_amount = new CommonV3Money($data['fee_amount']);
        }
        if (isset($data['shipping_amount'])) {
            $this->shipping_amount = new CommonV3Money($data['shipping_amount']);
        }
        if (isset($data['tax_amount'])) {
            $this->tax_amount = new CommonV3Money($data['tax_amount']);
        }
        if (isset($data['net_amount'])) {
            $this->net_amount = new CommonV3Money($data['net_amount']);
        }
    }

    public function __construct(array $data = null)
    {
        $this->gross_amount = new CommonV3Money();
        $this->net_amount = new CommonV3Money();
        if (isset($data)) {
            $this->map($data);
        }
    }
}
