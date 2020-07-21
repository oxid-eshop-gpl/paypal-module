<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Shipping details for transaction.
 */
class ShippingDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * @var AddressWithConfirmation
     * Address and confirmation details.
     */
    public $shipping_address;

    /** @var array<ShippingOption> */
    public $options;
}
