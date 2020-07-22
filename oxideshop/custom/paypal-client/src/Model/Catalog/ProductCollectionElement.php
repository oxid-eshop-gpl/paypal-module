<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details for a product in the collection response.
 *
 * generated from: product_collection_element.json
 */
class ProductCollectionElement implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The ID of the product.
     */
    public $id;

    /**
     * @var string
     * The product name.
     */
    public $name;

    /**
     * @var string
     * The product description.
     */
    public $description;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $create_time;

    /**
     * @var array<array>
     * An array of request-related [HATEOAS links](/docs/api/overview/#hateoas-links).
     */
    public $links;
}
