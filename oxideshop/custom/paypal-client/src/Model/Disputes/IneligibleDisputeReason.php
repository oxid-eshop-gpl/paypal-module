<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The ineligible dispute with the reason for ineligibility.
 */
class IneligibleDisputeReason implements JsonSerializable
{
    use BaseModel;

    const DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED = 'MERCHANDISE_OR_SERVICE_NOT_RECEIVED';
    const DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED = 'MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED';
    const DISPUTE_REASON_UNAUTHORISED = 'UNAUTHORISED';
    const DISPUTE_REASON_CREDIT_NOT_PROCESSED = 'CREDIT_NOT_PROCESSED';
    const DISPUTE_REASON_DUPLICATE_TRANSACTION = 'DUPLICATE_TRANSACTION';
    const DISPUTE_REASON_INCORRECT_AMOUNT = 'INCORRECT_AMOUNT';
    const DISPUTE_REASON_PAYMENT_BY_OTHER_MEANS = 'PAYMENT_BY_OTHER_MEANS';
    const DISPUTE_REASON_CANCELED_RECURRING_BILLING = 'CANCELED_RECURRING_BILLING';
    const DISPUTE_REASON_PROBLEM_WITH_REMITTANCE = 'PROBLEM_WITH_REMITTANCE';
    const DISPUTE_REASON_OTHER = 'OTHER';

    /**
     * @var string
     * The reason for the item-level dispute. For information about the required information for each dispute reason
     * and associated evidence type, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     *
     * use one of constants defined in this class to set the value:
     * @see DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED
     * @see DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED
     * @see DISPUTE_REASON_UNAUTHORISED
     * @see DISPUTE_REASON_CREDIT_NOT_PROCESSED
     * @see DISPUTE_REASON_DUPLICATE_TRANSACTION
     * @see DISPUTE_REASON_INCORRECT_AMOUNT
     * @see DISPUTE_REASON_PAYMENT_BY_OTHER_MEANS
     * @see DISPUTE_REASON_CANCELED_RECURRING_BILLING
     * @see DISPUTE_REASON_PROBLEM_WITH_REMITTANCE
     * @see DISPUTE_REASON_OTHER
     */
    public $dispute_reason;

    /** @var string */
    public $ineligibility_reason;
}
