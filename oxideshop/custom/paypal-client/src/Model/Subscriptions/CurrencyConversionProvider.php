<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The list of currency conversion providers.
 */
class CurrencyConversionProvider implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
