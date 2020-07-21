<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details for the items to be purchased.
 */
class Item implements JsonSerializable
{
    use BaseModel;

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
}
