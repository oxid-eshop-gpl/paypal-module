<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The detailed breakdown of the capture activity.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-seller_receivable_breakdown.json
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
     *
     * maxItems: 0
     * maxItems: 1
     */
    public $platform_fees;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->gross_amount) || Assert::notNull($this->gross_amount->currency_code, "currency_code in gross_amount must not be NULL within SellerReceivableBreakdown $within");
        !isset($this->gross_amount) || Assert::notNull($this->gross_amount->value, "value in gross_amount must not be NULL within SellerReceivableBreakdown $within");
        !isset($this->gross_amount) || Assert::isInstanceOf($this->gross_amount, Money::class, "gross_amount in SellerReceivableBreakdown must be instance of Money $within");
        !isset($this->gross_amount) || $this->gross_amount->validate(SellerReceivableBreakdown::class);
        !isset($this->paypal_fee) || Assert::notNull($this->paypal_fee->currency_code, "currency_code in paypal_fee must not be NULL within SellerReceivableBreakdown $within");
        !isset($this->paypal_fee) || Assert::notNull($this->paypal_fee->value, "value in paypal_fee must not be NULL within SellerReceivableBreakdown $within");
        !isset($this->paypal_fee) || Assert::isInstanceOf($this->paypal_fee, Money::class, "paypal_fee in SellerReceivableBreakdown must be instance of Money $within");
        !isset($this->paypal_fee) || $this->paypal_fee->validate(SellerReceivableBreakdown::class);
        !isset($this->paypal_fee_in_receivable_currency) || Assert::notNull($this->paypal_fee_in_receivable_currency->currency_code, "currency_code in paypal_fee_in_receivable_currency must not be NULL within SellerReceivableBreakdown $within");
        !isset($this->paypal_fee_in_receivable_currency) || Assert::notNull($this->paypal_fee_in_receivable_currency->value, "value in paypal_fee_in_receivable_currency must not be NULL within SellerReceivableBreakdown $within");
        !isset($this->paypal_fee_in_receivable_currency) || Assert::isInstanceOf($this->paypal_fee_in_receivable_currency, Money::class, "paypal_fee_in_receivable_currency in SellerReceivableBreakdown must be instance of Money $within");
        !isset($this->paypal_fee_in_receivable_currency) || $this->paypal_fee_in_receivable_currency->validate(SellerReceivableBreakdown::class);
        !isset($this->net_amount) || Assert::notNull($this->net_amount->currency_code, "currency_code in net_amount must not be NULL within SellerReceivableBreakdown $within");
        !isset($this->net_amount) || Assert::notNull($this->net_amount->value, "value in net_amount must not be NULL within SellerReceivableBreakdown $within");
        !isset($this->net_amount) || Assert::isInstanceOf($this->net_amount, Money::class, "net_amount in SellerReceivableBreakdown must be instance of Money $within");
        !isset($this->net_amount) || $this->net_amount->validate(SellerReceivableBreakdown::class);
        !isset($this->receivable_amount) || Assert::notNull($this->receivable_amount->currency_code, "currency_code in receivable_amount must not be NULL within SellerReceivableBreakdown $within");
        !isset($this->receivable_amount) || Assert::notNull($this->receivable_amount->value, "value in receivable_amount must not be NULL within SellerReceivableBreakdown $within");
        !isset($this->receivable_amount) || Assert::isInstanceOf($this->receivable_amount, Money::class, "receivable_amount in SellerReceivableBreakdown must be instance of Money $within");
        !isset($this->receivable_amount) || $this->receivable_amount->validate(SellerReceivableBreakdown::class);
        !isset($this->exchange_rate) || Assert::isInstanceOf($this->exchange_rate, ExchangeRate::class, "exchange_rate in SellerReceivableBreakdown must be instance of ExchangeRate $within");
        !isset($this->exchange_rate) || $this->exchange_rate->validate(SellerReceivableBreakdown::class);
        Assert::notNull($this->platform_fees, "platform_fees in SellerReceivableBreakdown must not be NULL $within");
         Assert::minCount($this->platform_fees, 0, "platform_fees in SellerReceivableBreakdown must have min. count of 0 $within");
         Assert::maxCount($this->platform_fees, 1, "platform_fees in SellerReceivableBreakdown must have max. count of 1 $within");
         Assert::isArray($this->platform_fees, "platform_fees in SellerReceivableBreakdown must be array $within");

                                if (isset($this->platform_fees)){
                                    foreach ($this->platform_fees as $item) {
                                        $item->validate(SellerReceivableBreakdown::class);
                                    }
                                }
    }

    public function __construct()
    {
    }
}
