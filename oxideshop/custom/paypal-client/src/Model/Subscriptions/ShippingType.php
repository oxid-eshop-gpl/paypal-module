<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The method by which the payer wants to get their items.
 */
class ShippingType implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
