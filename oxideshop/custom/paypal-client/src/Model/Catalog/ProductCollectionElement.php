<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details for a product in the collection response.
 */
class ProductCollectionElement implements \JsonSerializable
{
    use BaseModel;

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
}
