<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Transactions status result identifier. The outcome of the issuer's authentication.
 */
class ParesStatus implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
