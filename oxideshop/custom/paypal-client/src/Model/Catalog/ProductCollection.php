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

    /**
     * @var array<ProductCollectionElement>
     * An array of products.
     */
    public $products;

    /**
     * @var integer
     * The total number of items.
     */
    public $total_items;

    /**
     * @var integer
     * The total number of pages.
     */
    public $total_pages;

    /**
     * @var array<array>
     * An array of request-related [HATEOAS links](/docs/api/overview/#hateoas-links).
     */
    public $links;

    public function validate()
    {
    }
}
