<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * Date of birth data provided by the user
 */
class BirthDetails implements \JsonSerializable
{
    /** @var string */
    public $date_of_birth;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
