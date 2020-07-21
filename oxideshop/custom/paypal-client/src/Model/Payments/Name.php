<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The name of the party.
 */
class Name implements \JsonSerializable
{
    /** @var string */
    public $prefix;

    /** @var string */
    public $given_name;

    /** @var string */
    public $surname;

    /** @var string */
    public $middle_name;

    /** @var string */
    public $suffix;

    /** @var string */
    public $alternate_full_name;

    /** @var string */
    public $full_name;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
