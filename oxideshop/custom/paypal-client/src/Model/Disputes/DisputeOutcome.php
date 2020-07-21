<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The outcome of a dispute.
 */
class DisputeOutcome implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $outcome_code;

    /** @var string */
    public $outcome_reason;

    /** @var Money */
    public $amount_refunded;
}
