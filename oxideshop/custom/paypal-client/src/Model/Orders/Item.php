<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The details for the items to be purchased.
 */
class Item implements \JsonSerializable
{
    /** @var string */
    public $name;

    /** @var Money */
    public $unit_amount;

    /** @var Money */
    public $tax;

    /** @var string */
    public $quantity;

    /** @var string */
    public $description;

    /** @var string */
    public $sku;

    /** @var string */
    public $category;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
