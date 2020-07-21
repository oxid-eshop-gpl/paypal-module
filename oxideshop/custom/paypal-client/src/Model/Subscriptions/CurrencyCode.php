<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The [three-character ISO-4217 currency code](/docs/integration/direct/rest/currency-codes/) that identifies the currency.
 */
class CurrencyCode implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
