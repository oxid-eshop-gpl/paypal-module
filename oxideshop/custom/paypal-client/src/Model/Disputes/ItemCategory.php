<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The category of the item in dispute.
 */
class ItemCategory implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
