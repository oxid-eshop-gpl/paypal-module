<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Customer care contact information.
 */
class CustomerServiceContact implements \JsonSerializable
{
    /** @var array */
    public $emails;

    /** @var array */
    public $phones;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
