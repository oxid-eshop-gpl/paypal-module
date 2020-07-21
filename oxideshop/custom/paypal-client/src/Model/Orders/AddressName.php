<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The name and address, typically used for billing and shipping purposes.
 */
class AddressName extends AddressPortable implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $addressee;
}
