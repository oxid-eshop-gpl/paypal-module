<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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
     * @var array<PlatformFee>
     * An array of platform or partner fees, commissions, or brokerage fees for the refund.
     */
    public $platform_fees;

    /**
     * @var array<NetAmountBreakdownItem>
     * An array of breakdown values for the net amount. Returned when the currency of the refund is different from
     * the currency of the PayPal account where the payee holds their funds.
     */
    public $net_amount_breakdown;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $total_refunded_amount;

    public function validate()
    {
        assert(isset($this->gross_amount));
        assert(isset($this->paypal_fee));
        assert(isset($this->net_amount));
        assert(isset($this->total_refunded_amount));
    }
}
