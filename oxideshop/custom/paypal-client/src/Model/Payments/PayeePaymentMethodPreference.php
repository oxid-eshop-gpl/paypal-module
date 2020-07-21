<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The merchant-preferred payment methods.
 */
class PayeePaymentMethodPreference implements JsonSerializable
{
    use BaseModel;
}
