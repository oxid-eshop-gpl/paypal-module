<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The shipping details.
 */
class ShippingDetail implements \JsonSerializable
{
    /** @var Name */
    public $name;

    /** @var array */
    public $options;

    /** @var AddressPortable */
    public $address;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
