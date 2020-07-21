<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Transactions status result identifier. The outcome of the issuer's authentication.
 */
class ParesStatus implements JsonSerializable
{
    use BaseModel;
}
