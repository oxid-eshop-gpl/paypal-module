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
     *
     * minLength: 6
     * maxLength: 50
     */
    public $id;

    /**
     * @var string
     * The product name.
     *
     * minLength: 1
     * maxLength: 127
     */
    public $name;

    /**
     * @var string
     * The product description.
     *
     * minLength: 1
     * maxLength: 256
     */
    public $description;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    /**
     * @var array<array>
     * An array of request-related [HATEOAS links](/docs/api/overview/#hateoas-links).
     */
    public $links;

    public function validate()
    {
        assert(!isset($this->id) || strlen($this->id) >= 6);
        assert(!isset($this->id) || strlen($this->id) <= 50);
        assert(!isset($this->name) || strlen($this->name) >= 1);
        assert(!isset($this->name) || strlen($this->name) <= 127);
        assert(!isset($this->description) || strlen($this->description) >= 1);
        assert(!isset($this->description) || strlen($this->description) <= 256);
        assert(!isset($this->create_time) || strlen($this->create_time) >= 20);
        assert(!isset($this->create_time) || strlen($this->create_time) <= 64);
    }
}
