<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Liability type defined by PayPal Risk.
 */
class LiabilityType implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
