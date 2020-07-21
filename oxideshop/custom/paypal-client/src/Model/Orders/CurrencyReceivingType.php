<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Currency receiving type defines the options when receiving payment in a currency not held by the reciver.
 */
class CurrencyReceivingType implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
