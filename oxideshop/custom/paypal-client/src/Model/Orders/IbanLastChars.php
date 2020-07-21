<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The last characters of the IBAN used to pay.
 */
class IbanLastChars implements JsonSerializable
{
    use BaseModel;
}
