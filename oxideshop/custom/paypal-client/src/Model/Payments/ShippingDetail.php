<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The shipping details.
 */
class ShippingDetail implements \JsonSerializable
{
    use BaseModel;

    /** @var Name */
    public $name;

    /** @var array */
    public $options;

    /** @var AddressPortable */
    public $address;
}
