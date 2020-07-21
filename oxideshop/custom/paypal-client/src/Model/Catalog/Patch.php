<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

/**
 * The JSON patch object to apply partial updates to resources.
 */
class Patch implements \JsonSerializable
{
    /** @var string */
    public $op;

    /** @var string */
    public $path;

    /** @var number|integer|string|boolean|null|array|object */
    public $value;

    /** @var string */
    public $from;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
