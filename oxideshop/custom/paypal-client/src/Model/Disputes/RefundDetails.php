<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The refund details.
 */
class RefundDetails implements JsonSerializable
{
    use BaseModel;

    /** @var Money */
    public $allowed_refund_amount;

    /** @var array<Refund> */
    public $refunds;
}
