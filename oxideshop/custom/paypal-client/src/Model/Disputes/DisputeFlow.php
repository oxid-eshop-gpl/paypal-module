<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The flow ID for the dispute ID.
 */
class DisputeFlow implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
