<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The outcome of a dispute.
 */
class DisputeOutcome implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $outcome_code;

    /** @var string */
    public $outcome_reason;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount_refunded;
}
