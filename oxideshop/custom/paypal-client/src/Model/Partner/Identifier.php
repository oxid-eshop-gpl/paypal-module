<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The bank account ID. An ID with `ROUTING_NUMBER_1` is required.
 */
class Identifier implements \JsonSerializable
{
    /** @var string */
    public $type;

    /** @var string */
    public $value;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
