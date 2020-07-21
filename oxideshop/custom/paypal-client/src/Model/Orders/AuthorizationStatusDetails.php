<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The details of the authorized payment status.
 */
class AuthorizationStatusDetails implements \JsonSerializable
{
    /** @var string */
    public $reason;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
