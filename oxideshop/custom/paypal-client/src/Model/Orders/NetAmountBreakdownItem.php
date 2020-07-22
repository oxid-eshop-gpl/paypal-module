<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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

    public function validate()
    {
        assert(isset($this->payable_amount));
        assert(isset($this->converted_amount));
    }
}
