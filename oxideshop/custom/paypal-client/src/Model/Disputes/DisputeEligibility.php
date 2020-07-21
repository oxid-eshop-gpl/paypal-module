<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The eligible and ineligible disputes with reasons.
 */
class DisputeEligibility implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $seller_transaction_id;

    /** @var string */
    public $buyer_transaction_id;

    /** @var array<EligibleDisputeReason> */
    public $eligible_dispute_reasons;

    /** @var array<IneligibleDisputeReason> */
    public $ineligible_dispute_reasons;

    /** @var string */
    public $recommended_dispute_reason;
}
