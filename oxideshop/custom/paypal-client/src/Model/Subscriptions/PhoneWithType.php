<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The phone information.
 */
class PhoneWithType implements \JsonSerializable
{
    /** @var string */
    public $phone_type;

    /** @var Phone */
    public $phone_number;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
