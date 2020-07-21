<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Phone information.
 */
class PhoneInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Phone
     * The phone number in its canonical international [E.164 numbering plan
     * format](https://www.itu.int/rec/T-REC-E.164/en).
     */
    public $phone_number;

    /**
     * @var string
     * The phone type.
     */
    public $phone_type;
}
