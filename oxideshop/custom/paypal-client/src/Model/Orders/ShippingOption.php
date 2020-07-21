<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The options that the payee or merchant offers to the payer to ship or pick up their items.
 */
class ShippingOption implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var string */
    public $label;

    /** @var string */
    public $type;

    /** @var Money */
    public $amount;

    /** @var boolean */
    public $selected;
}
