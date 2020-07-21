<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The phone information.
 */
class PhoneWithType implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $phone_type;

    /** @var Phone */
    public $phone_number;
}
