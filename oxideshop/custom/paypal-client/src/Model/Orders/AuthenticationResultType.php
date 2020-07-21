<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Indicates the form of authentication used on the financial instrument.
 */
class AuthenticationResultType implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $type;
}
