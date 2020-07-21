<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The percentage, as a fixed-point, signed decimal number. For example, define a 19.99% interest rate as
 * `19.99`.
 */
class Percentage implements JsonSerializable
{
    use BaseModel;
}
