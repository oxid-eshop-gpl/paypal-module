<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The options that the payee or merchant offers to the payer to ship or pick up their items.
 */
class ShippingOption implements JsonSerializable
{
    use BaseModel;

    const TYPE_SHIPPING = 'SHIPPING';
    const TYPE_PICKUP = 'PICKUP';

    /** @var string */
    public $id;

    /** @var string */
    public $label;

    /**
     * @var string
     * The method by which the payer wants to get their items.
     */
    public $type;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount;

    /** @var boolean */
    public $selected;
}
