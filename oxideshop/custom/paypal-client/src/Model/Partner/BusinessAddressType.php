<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * Address type under which the provided address is tagged
 */
class BusinessAddressType implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
