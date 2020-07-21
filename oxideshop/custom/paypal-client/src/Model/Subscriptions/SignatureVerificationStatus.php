<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Transaction signature status identifier.
 */
class SignatureVerificationStatus implements JsonSerializable
{
    use BaseModel;
}
