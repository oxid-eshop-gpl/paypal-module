<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information used to pay using TrustPay.
 */
class Trustpay implements \JsonSerializable
{
    /** @var string */
    public $name;

    /** @var string */
    public $country_code;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
