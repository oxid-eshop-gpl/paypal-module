<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

/**
 * The details for a product in the collection response.
 */
class ProductCollectionElement implements \JsonSerializable
{
    /** @var string */
    public $id;

    /** @var string */
    public $name;

    /** @var string */
    public $description;

    /** @var string */
    public $create_time;

    /** @var array */
    public $links;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
