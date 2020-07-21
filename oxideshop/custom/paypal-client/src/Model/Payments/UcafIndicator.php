<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Universal Cardholder Authentication Field (UCAF) Indicator value provided by the issuer.
 */
class UcafIndicator implements JsonSerializable
{
    use BaseModel;
}
