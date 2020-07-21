<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The details about a saved payment source.
 */
class VaultResponse implements \JsonSerializable
{
    /** @var string */
    public $id;

    /** @var string */
    public $status;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
