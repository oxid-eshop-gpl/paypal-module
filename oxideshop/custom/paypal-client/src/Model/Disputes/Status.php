<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The status of the dispute.
 */
class Status implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
