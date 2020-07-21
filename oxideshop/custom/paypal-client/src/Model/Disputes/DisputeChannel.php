<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The channel where the customer created the dispute.
 */
class DisputeChannel implements JsonSerializable
{
    use BaseModel;
}
