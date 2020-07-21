<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The time, in the hh:mm 24 Hr format.
 */
class TimeHourmin implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
