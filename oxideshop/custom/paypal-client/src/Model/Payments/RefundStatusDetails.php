<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details of the refund status.
 */
class RefundStatusDetails implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $reason;
}
