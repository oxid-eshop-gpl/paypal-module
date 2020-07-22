<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The net amount. Returned when the currency of the refund is different from the currency of the PayPal account
 * where the merchant holds their funds.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-net_amount_breakdown_item.json
 */
class NetAmountBreakdownItem implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $payable_amount;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $converted_amount;

    /**
     * @var ExchangeRate
     * The exchange rate that determines the amount to convert from one currency to another currency.
     */
    public $exchange_rate;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payable_amount) || Assert::isInstanceOf($this->payable_amount, Money::class, "payable_amount in NetAmountBreakdownItem must be instance of Money $within");
        !isset($this->payable_amount) || $this->payable_amount->validate(NetAmountBreakdownItem::class);
        !isset($this->converted_amount) || Assert::isInstanceOf($this->converted_amount, Money::class, "converted_amount in NetAmountBreakdownItem must be instance of Money $within");
        !isset($this->converted_amount) || $this->converted_amount->validate(NetAmountBreakdownItem::class);
        !isset($this->exchange_rate) || Assert::isInstanceOf($this->exchange_rate, ExchangeRate::class, "exchange_rate in NetAmountBreakdownItem must be instance of ExchangeRate $within");
        !isset($this->exchange_rate) || $this->exchange_rate->validate(NetAmountBreakdownItem::class);
    }

    public function __construct()
    {
    }
}
