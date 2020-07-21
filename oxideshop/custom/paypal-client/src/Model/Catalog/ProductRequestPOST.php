<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The create product request details.
 */
class ProductRequestPOST implements JsonSerializable
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

    /**
     * @var string
     * The product category.
     */
    public $category;

    /** @var string */
    public $image_url;

    /** @var string */
    public $home_url;
}
