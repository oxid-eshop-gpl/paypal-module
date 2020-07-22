<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The currency and amount for a financial transaction, such as a balance or payment due.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-common_components-v3-schema-json-openapi-2.0-money.json
 */
class Money implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The [three-character ISO-4217 currency code](/docs/integration/direct/rest/currency-codes/) that identifies
     * the currency.
     */
    public $currency_code;

    /** @var string */
    public $value;
}
