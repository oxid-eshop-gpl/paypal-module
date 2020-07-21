<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Soft Descriptor Details.
 */
class SoftDescriptorDetails implements \JsonSerializable
{
    /** @var string */
    public $soft_descriptor;

    /** @var string */
    public $contact_type;

    /** @var string */
    public $contact_value;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
