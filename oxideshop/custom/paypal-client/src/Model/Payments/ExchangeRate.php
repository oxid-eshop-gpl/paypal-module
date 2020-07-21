<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The exchange rate that determines the amount to convert from one currency to another currency.
 */
class ExchangeRate implements \JsonSerializable
{
    /** @var string */
    public $source_currency;

    /** @var string */
    public $target_currency;

    /** @var string */
    public $value;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
