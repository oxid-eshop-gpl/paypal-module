<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The PayPal product for which the customer is onboarded.
 */
class Product implements JsonSerializable
{
    use BaseModel;
}
