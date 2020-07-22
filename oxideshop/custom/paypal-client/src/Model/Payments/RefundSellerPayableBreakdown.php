<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The breakdown of the refund.
 *
 * generated from: Refund_seller_payable_breakdown
 */
class RefundSellerPayableBreakdown implements JsonSerializable
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
    public $paypal_fee;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $net_amount;

    /**
     * @var PlatformFee[]
     * An array of platform or partner fees, commissions, or brokerage fees for the refund.
     *
     * this is mandatory to be set
     * maxItems: 0
     * maxItems: 1
     */
    public $platform_fees;

    /**
     * @var NetAmountBreakdownItem[]
     * An array of breakdown values for the net amount. Returned when the currency of the refund is different from
     * the currency of the PayPal account where the payee holds their funds.
     */
    public $net_amount_breakdown;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $total_refunded_amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->gross_amount) || Assert::isInstanceOf($this->gross_amount, Money::class, "gross_amount in RefundSellerPayableBreakdown must be instance of Money $within");
        !isset($this->gross_amount) || $this->gross_amount->validate(RefundSellerPayableBreakdown::class);
        !isset($this->paypal_fee) || Assert::isInstanceOf($this->paypal_fee, Money::class, "paypal_fee in RefundSellerPayableBreakdown must be instance of Money $within");
        !isset($this->paypal_fee) || $this->paypal_fee->validate(RefundSellerPayableBreakdown::class);
        !isset($this->net_amount) || Assert::isInstanceOf($this->net_amount, Money::class, "net_amount in RefundSellerPayableBreakdown must be instance of Money $within");
        !isset($this->net_amount) || $this->net_amount->validate(RefundSellerPayableBreakdown::class);
        Assert::notNull($this->platform_fees, "platform_fees in RefundSellerPayableBreakdown must not be NULL $within");
         Assert::minCount($this->platform_fees, 0, "platform_fees in RefundSellerPayableBreakdown must have min. count of 0 $within");
         Assert::maxCount($this->platform_fees, 1, "platform_fees in RefundSellerPayableBreakdown must have max. count of 1 $within");
         Assert::isArray($this->platform_fees, "platform_fees in RefundSellerPayableBreakdown must be array $within");

                                if (isset($this->platform_fees)){
                                    foreach ($this->platform_fees as $item) {
                                        $item->validate(RefundSellerPayableBreakdown::class);
                                    }
                                }

        !isset($this->net_amount_breakdown) || Assert::isArray($this->net_amount_breakdown, "net_amount_breakdown in RefundSellerPayableBreakdown must be array $within");

                                if (isset($this->net_amount_breakdown)){
                                    foreach ($this->net_amount_breakdown as $item) {
                                        $item->validate(RefundSellerPayableBreakdown::class);
                                    }
                                }

        !isset($this->total_refunded_amount) || Assert::isInstanceOf($this->total_refunded_amount, Money::class, "total_refunded_amount in RefundSellerPayableBreakdown must be instance of Money $within");
        !isset($this->total_refunded_amount) || $this->total_refunded_amount->validate(RefundSellerPayableBreakdown::class);
    }

    public function __construct()
    {
    }
}
