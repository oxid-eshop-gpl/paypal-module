<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

/**
 * An array of JSON patch objects to apply partial updates to resources.
 */
class PatchRequest implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
