<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The product details.
 */
class Product implements \JsonSerializable
{
    use BaseModel;

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
}
