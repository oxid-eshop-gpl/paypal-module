<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The refund details.
 *
 * generated from: response-refund_details.json
 */
class RefundDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $allowed_refund_amount;

    /**
     * @var array<Refund>
     * An array of refund objects.
     */
    public $refunds;
}
