<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information used to pay using BLIK
 */
class Blik implements \JsonSerializable
{
    /** @var string */
    public $name;

    /** @var string */
    public $country_code;

    /** @var string */
    public $email;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
