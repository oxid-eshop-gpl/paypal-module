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

    const RECOMMENDED_DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED = 'MERCHANDISE_OR_SERVICE_NOT_RECEIVED';
    const RECOMMENDED_DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED = 'MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED';
    const RECOMMENDED_DISPUTE_REASON_UNAUTHORISED = 'UNAUTHORISED';
    const RECOMMENDED_DISPUTE_REASON_CREDIT_NOT_PROCESSED = 'CREDIT_NOT_PROCESSED';
    const RECOMMENDED_DISPUTE_REASON_DUPLICATE_TRANSACTION = 'DUPLICATE_TRANSACTION';
    const RECOMMENDED_DISPUTE_REASON_INCORRECT_AMOUNT = 'INCORRECT_AMOUNT';
    const RECOMMENDED_DISPUTE_REASON_PAYMENT_BY_OTHER_MEANS = 'PAYMENT_BY_OTHER_MEANS';
    const RECOMMENDED_DISPUTE_REASON_CANCELED_RECURRING_BILLING = 'CANCELED_RECURRING_BILLING';
    const RECOMMENDED_DISPUTE_REASON_PROBLEM_WITH_REMITTANCE = 'PROBLEM_WITH_REMITTANCE';
    const RECOMMENDED_DISPUTE_REASON_OTHER = 'OTHER';

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
