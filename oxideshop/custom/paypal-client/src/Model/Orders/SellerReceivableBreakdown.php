<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The detailed breakdown of the capture activity.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-seller_receivable_breakdown.json
 */
class SellerReceivableBreakdown implements JsonSerializable
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
    public $paypal_fee_in_receivable_currency;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $net_amount;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $receivable_amount;

    /**
     * @var ExchangeRate
     * The exchange rate that determines the amount to convert from one currency to another currency.
     */
    public $exchange_rate;

    /**
     * @var array<PlatformFee>
     * An array of platform or partner fees, commissions, or brokerage fees that associated with the captured
     * payment.
     */
    public $platform_fees;

    public function validate()
    {
        assert(isset($this->gross_amount));
        assert(isset($this->paypal_fee));
        assert(isset($this->paypal_fee_in_receivable_currency));
        assert(isset($this->net_amount));
        assert(isset($this->receivable_amount));
    }
}
