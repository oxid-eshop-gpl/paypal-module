<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * A simple postal address with coarse-grained fields.
 */
class PersonAddressDetail extends \AddressPortable implements \JsonSerializable
{
    /** @var string */
    public $type;

    /** @var boolean */
    public $primary;

    /** @var boolean */
    public $inactive;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
