<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength($this->id, 6, "id in ProductCollectionElement must have minlength of 6 $within");
        !isset($this->id) || Assert::maxLength($this->id, 50, "id in ProductCollectionElement must have maxlength of 50 $within");
        !isset($this->name) || Assert::minLength($this->name, 1, "name in ProductCollectionElement must have minlength of 1 $within");
        !isset($this->name) || Assert::maxLength($this->name, 127, "name in ProductCollectionElement must have maxlength of 127 $within");
        !isset($this->description) || Assert::minLength($this->description, 1, "description in ProductCollectionElement must have minlength of 1 $within");
        !isset($this->description) || Assert::maxLength($this->description, 256, "description in ProductCollectionElement must have maxlength of 256 $within");
        !isset($this->create_time) || Assert::minLength($this->create_time, 20, "create_time in ProductCollectionElement must have minlength of 20 $within");
        !isset($this->create_time) || Assert::maxLength($this->create_time, 64, "create_time in ProductCollectionElement must have maxlength of 64 $within");
        !isset($this->links) || Assert::isArray($this->links, "links in ProductCollectionElement must be array $within");
    }

    public function __construct()
    {
    }
}
