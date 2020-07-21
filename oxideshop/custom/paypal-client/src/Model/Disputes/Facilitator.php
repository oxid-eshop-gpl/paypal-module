<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * A resource representing a Facilitator/Partner who facilitates a transaction.
 */
class Facilitator implements \JsonSerializable
{
    /** @var string */
    public $name;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
