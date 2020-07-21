<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Shipping details for transaction.
 */
class ShippingDetails implements \JsonSerializable
{
    use BaseModel;

    /** @var AddressWithConfirmation */
    public $shipping_address;

    /** @var array */
    public $options;
}
