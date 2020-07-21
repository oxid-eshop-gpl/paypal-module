<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The [three-character ISO-4217 currency code](/docs/integration/direct/rest/currency-codes/) that identifies
 * the currency.
 */
class CurrencyCode implements JsonSerializable
{
    use BaseModel;
}
