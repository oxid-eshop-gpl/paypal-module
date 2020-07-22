<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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
     *
     * maxItems: 1
     * maxItems: 32767
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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->products, "products in ProductCollection must not be NULL $within");
         Assert::minCount($this->products, 1, "products in ProductCollection must have min. count of 1 $within");
         Assert::maxCount($this->products, 32767, "products in ProductCollection must have max. count of 32767 $within");
         Assert::isArray($this->products, "products in ProductCollection must be array $within");

                                if (isset($this->products)){
                                    foreach ($this->products as $item) {
                                        $item->validate(ProductCollection::class);
                                    }
                                }

        !isset($this->links) || Assert::isArray($this->links, "links in ProductCollection must be array $within");
    }

    public function __construct()
    {
    }
}
