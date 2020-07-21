<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Phone information.
 */
class PhoneInfo implements \JsonSerializable
{
    use BaseModel;

    /** @var Phone */
    public $phone_number;

    /** @var string */
    public $phone_type;
}
