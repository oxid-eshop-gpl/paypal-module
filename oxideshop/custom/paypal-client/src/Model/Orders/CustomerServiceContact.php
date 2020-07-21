<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Customer care contact information.
 */
class CustomerServiceContact implements \JsonSerializable
{
    use BaseModel;

    /** @var array */
    public $emails;

    /** @var array */
    public $phones;
}
