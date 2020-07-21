<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The name and address, typically used for billing and shipping purposes.
 */
class AddressName extends \AddressPortable implements \JsonSerializable
{
    /** @var string */
    public $addressee;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
