<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * A request to settle a dispute in either the customer's or merchant's favor.
 */
class Adjudicate implements \JsonSerializable
{
    /** @var string */
    public $adjudication_outcome;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
