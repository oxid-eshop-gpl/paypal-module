<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

class AddressPortablePostalCodeValidation implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
