<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Indicates the type of authentication that was used to challenge the card holder.
 */
class AuthenticationType implements JsonSerializable
{
    use BaseModel;
}
