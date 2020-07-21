<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Type of pricing applied to a payment.
 */
class PricingType implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
