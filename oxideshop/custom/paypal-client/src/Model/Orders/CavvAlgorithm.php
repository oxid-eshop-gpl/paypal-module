<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Indicates the algorithm used to generate the CAVV/AAV value.
 */
class CavvAlgorithm implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
