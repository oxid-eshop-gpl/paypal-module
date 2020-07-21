<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The address type under which the provided address is tagged.
 */
class PersonAddressType implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
