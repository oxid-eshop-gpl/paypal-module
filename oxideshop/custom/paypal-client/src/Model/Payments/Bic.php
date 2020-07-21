<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The business identification code (BIC). In payments systems, a BIC is used to identify a specific business,
 * most commonly a bank
 */
class Bic implements JsonSerializable
{
    use BaseModel;
}
