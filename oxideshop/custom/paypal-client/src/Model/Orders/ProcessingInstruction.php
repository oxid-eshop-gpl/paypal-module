<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The instruction to process an order.
 */
class ProcessingInstruction implements JsonSerializable
{
    use BaseModel;
}
