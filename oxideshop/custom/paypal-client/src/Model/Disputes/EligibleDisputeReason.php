<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The eligible dispute reason.
 */
class EligibleDisputeReason implements JsonSerializable
{
    use BaseModel;

    /** The customer did not receive the merchandise or service. */
    const DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED = 'MERCHANDISE_OR_SERVICE_NOT_RECEIVED';

    /** The customer reports that the merchandise or service is not as described. */
    const DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED = 'MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED';

    /** The customer did not authorize purchase of the merchandise or service. */
    const DISPUTE_REASON_UNAUTHORISED = 'UNAUTHORISED';

    /** The refund or credit was not processed for the customer. */
    const DISPUTE_REASON_CREDIT_NOT_PROCESSED = 'CREDIT_NOT_PROCESSED';

    /** The transaction was a duplicate. */
    const DISPUTE_REASON_DUPLICATE_TRANSACTION = 'DUPLICATE_TRANSACTION';

    /** The customer was charged an incorrect amount. */
    const DISPUTE_REASON_INCORRECT_AMOUNT = 'INCORRECT_AMOUNT';

    /** The customer paid for the transaction through other means. */
    const DISPUTE_REASON_PAYMENT_BY_OTHER_MEANS = 'PAYMENT_BY_OTHER_MEANS';

    /** The customer was being charged for a subscription or a recurring transaction that was canceled. */
    const DISPUTE_REASON_CANCELED_RECURRING_BILLING = 'CANCELED_RECURRING_BILLING';

    /** A problem occurred with the remittance. */
    const DISPUTE_REASON_PROBLEM_WITH_REMITTANCE = 'PROBLEM_WITH_REMITTANCE';

    /** Other. */
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

    /** @var EligibleDisputeReasonAllowableLifeCycle */
    public $allowable_life_cycle;
}
