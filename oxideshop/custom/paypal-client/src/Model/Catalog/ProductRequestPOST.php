<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

/**
 * The create product request details.
 */
class ProductRequestPOST implements \JsonSerializable
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

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
