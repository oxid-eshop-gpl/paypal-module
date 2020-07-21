<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The classic permission name.
 */
class ClassicPermissionEnum implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
