<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The currency and amount for a financial transaction, such as a balance or payment due.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-common_components-v3-schema-json-openapi-2.0-money.json
 */
class Money implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The [three-character ISO-4217 currency code](/docs/integration/direct/rest/currency-codes/) that identifies
     * the currency.
     *
     * minLength: 3
     * maxLength: 3
     */
    public $currency_code;

    /**
     * @var string
     * The value, which might be:<ul><li>An integer for currencies like `JPY` that are not typically
     * fractional.</li><li>A decimal fraction for currencies like `TND` that are subdivided into
     * thousandths.</li></ul>For the required number of decimal places for a currency code, see [Currency
     * Codes](/docs/integration/direct/rest/currency-codes/).
     *
     * maxLength: 32
     */
    public $value;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->currency_code) || Assert::minLength($this->currency_code, 3, "currency_code in Money must have minlength of 3 $within");
        !isset($this->currency_code) || Assert::maxLength($this->currency_code, 3, "currency_code in Money must have maxlength of 3 $within");
        !isset($this->value) || Assert::maxLength($this->value, 32, "value in Money must have maxlength of 32 $within");
    }

    public function __construct()
    {
    }
}
