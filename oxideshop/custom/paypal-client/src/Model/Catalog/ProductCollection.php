<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

/**
 * The list of products, with details.
 */
class ProductCollection implements \JsonSerializable
{
    /** @var array */
    public $products;

    /** @var integer */
    public $total_items;

    /** @var integer */
    public $total_pages;

    /** @var array */
    public $links;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
