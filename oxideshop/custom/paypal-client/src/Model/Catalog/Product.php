<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

/**
 * The product details.
 */
class Product implements \JsonSerializable
{
    /** @var string */
    public $id;

    /** @var string */
    public $name;

    /** @var string */
    public $description;

    /** @var string */
    public $type;

    /** @var string */
    public $category;

    /** @var string */
    public $image_url;

    /** @var string */
    public $home_url;

    /** @var string */
    public $create_time;

    /** @var string */
    public $update_time;

    /** @var array */
    public $links;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
