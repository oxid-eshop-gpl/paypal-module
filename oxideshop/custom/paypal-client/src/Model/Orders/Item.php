<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details for the items to be purchased.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-item.json
 */
class Item implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $name;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $unit_amount;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
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
