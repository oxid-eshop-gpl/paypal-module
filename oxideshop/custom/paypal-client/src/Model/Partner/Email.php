<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * An email address at which the person or business can be contacted.
 */
class Email implements \JsonSerializable
{
    /** @var string */
    public $type;

    /** @var string */
    public $email;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
