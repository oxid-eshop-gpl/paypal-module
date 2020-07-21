<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Customer care contact information.
 */
class CustomerServiceContact implements JsonSerializable
{
    use BaseModel;

    /** @var array<string> */
    public $emails;

    /** @var array<PhoneInfo> */
    public $phones;
}
