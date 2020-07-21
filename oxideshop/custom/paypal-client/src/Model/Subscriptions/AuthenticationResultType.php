<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * Indicates the form of authentication used on the financial instrument.
 */
class AuthenticationResultType implements \JsonSerializable
{
    /** @var string */
    public $type;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
