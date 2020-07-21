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

    /**
     * @var string
     * The reason for the item-level dispute. For information about the required information for each dispute reason
     * and associated evidence type, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     */
    public $recommended_dispute_reason;
}
