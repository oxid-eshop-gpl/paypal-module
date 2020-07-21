<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Participant type.
 */
class ParticipantType implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
