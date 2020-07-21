<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details of the refund status.
 */
class RefundStatusDetails implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $reason;
}
