<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Auth-Capture Tolerance details.
 */
class AuthTolerance implements \JsonSerializable
{
    /** @var string */
    public $percent;

    /** @var Money */
    public $absolute;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
