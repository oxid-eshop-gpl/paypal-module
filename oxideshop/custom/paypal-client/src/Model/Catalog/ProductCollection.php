<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The list of products, with details.
 */
class ProductCollection implements \JsonSerializable
{
    use BaseModel;

    /** @var array */
    public $products;

    /** @var integer */
    public $total_items;

    /** @var integer */
    public $total_pages;

    /** @var array */
    public $links;
}
