<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The channel where the customer created the dispute.
 */
class DisputeChannel implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
