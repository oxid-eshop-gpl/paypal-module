<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

class AddressPortablePostalCodeValidation implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
