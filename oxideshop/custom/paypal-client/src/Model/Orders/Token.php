<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The tokenized payment source to fund a payment.
 */
class Token implements \JsonSerializable
{
    /** @var string */
    public $id;

    /** @var string */
    public $type;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
