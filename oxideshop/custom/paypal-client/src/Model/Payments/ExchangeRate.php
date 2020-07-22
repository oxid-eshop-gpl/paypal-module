<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The exchange rate that determines the amount to convert from one currency to another currency.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-exchange_rate.json
 */
class ExchangeRate implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The [three-character ISO-4217 currency code](/docs/integration/direct/rest/currency-codes/) that identifies
     * the currency.
     */
    public $source_currency;

    /**
     * @var string
     * The [three-character ISO-4217 currency code](/docs/integration/direct/rest/currency-codes/) that identifies
     * the currency.
     */
    public $target_currency;

    /**
     * @var string
     * The target currency amount. Equivalent to one unit of the source currency. Formatted as integer or decimal
     * value with one to 15 digits to the right of the decimal point.
     */
    public $value;
}