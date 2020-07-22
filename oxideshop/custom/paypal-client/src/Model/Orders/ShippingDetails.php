<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Shipping details for transaction.
 *
 * generated from: model-shipping_details.json
 */
class ShippingDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * @var AddressWithConfirmation
     * Address and confirmation details.
     */
    public $shipping_address;

    /**
     * @var array<ShippingOption>
     * An array of shipping options that the payee or merchant offers to the payer to ship or pick up their items.
     */
    public $options;
}
