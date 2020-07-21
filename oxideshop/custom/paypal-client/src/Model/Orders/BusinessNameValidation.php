<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

class BusinessNameValidation implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
