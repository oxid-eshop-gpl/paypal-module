<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The type of phone number provided. For example, home, work, or mobile.
 */
class BusinessPhoneType implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
