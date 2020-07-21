<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The outcome when the customer has contacted the merchant.
 */
class MerchantContactedOutcome implements JsonSerializable
{
    use BaseModel;
}
