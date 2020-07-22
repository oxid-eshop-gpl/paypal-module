<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The list of products, with details.
 *
 * generated from: product_collection.json
 */
class ProductCollection implements JsonSerializable
{
    use BaseModel;

    /** @var array<ProductCollectionElement> */
    public $products;

    /** @var integer */
    public $total_items;

    /** @var integer */
    public $total_pages;

    /** @var array<array> */
    public $links;
}
