<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The name of the person.
 */
class PersonName extends \Name implements \JsonSerializable
{
    /** @var string */
    public $type;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
