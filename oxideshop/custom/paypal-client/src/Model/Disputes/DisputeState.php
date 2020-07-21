<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The state of the dispute.
 */
class DisputeState implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
