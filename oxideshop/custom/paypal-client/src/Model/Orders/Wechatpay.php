<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information needed to pay using WeChat Pay.
 */
class Wechatpay implements \JsonSerializable
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
