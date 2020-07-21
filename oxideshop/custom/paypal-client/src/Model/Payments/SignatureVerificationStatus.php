<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Transaction signature status identifier.
 */
class SignatureVerificationStatus implements JsonSerializable
{
    use BaseModel;
}
