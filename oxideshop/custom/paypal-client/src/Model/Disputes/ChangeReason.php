<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A request to change the reason for a dispute.
 *
 * generated from: request-change_reason.json
 */
class ChangeReason implements JsonSerializable
{
    use BaseModel;

    /** The customer did not receive the merchandise or service. */
    const REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED = 'MERCHANDISE_OR_SERVICE_NOT_RECEIVED';

    /** The customer reports that the merchandise or service is not as described. */
    const REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED = 'MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED';

    /** The customer did not authorize purchase of the merchandise or service. */
    const REASON_UNAUTHORISED = 'UNAUTHORISED';

    /** The refund or credit was not processed for the customer. */
    const REASON_CREDIT_NOT_PROCESSED = 'CREDIT_NOT_PROCESSED';

    /** The transaction was a duplicate. */
    const REASON_DUPLICATE_TRANSACTION = 'DUPLICATE_TRANSACTION';

    /** The customer was charged an incorrect amount. */
    const REASON_INCORRECT_AMOUNT = 'INCORRECT_AMOUNT';

    /** The customer paid for the transaction through other means. */
    const REASON_PAYMENT_BY_OTHER_MEANS = 'PAYMENT_BY_OTHER_MEANS';

    /** The customer was being charged for a subscription or a recurring transaction that was canceled. */
    const REASON_CANCELED_RECURRING_BILLING = 'CANCELED_RECURRING_BILLING';

    /** A problem occurred with the remittance. */
    const REASON_PROBLEM_WITH_REMITTANCE = 'PROBLEM_WITH_REMITTANCE';

    /** Other. */
    const REASON_OTHER = 'OTHER';

    /**
     * @var string
     * The reason for the item-level dispute. For information about the required information for each dispute reason
     * and associated evidence type, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     *
     * use one of constants defined in this class to set the value:
     * @see REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED
     * @see REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED
     * @see REASON_UNAUTHORISED
     * @see REASON_CREDIT_NOT_PROCESSED
     * @see REASON_DUPLICATE_TRANSACTION
     * @see REASON_INCORRECT_AMOUNT
     * @see REASON_PAYMENT_BY_OTHER_MEANS
     * @see REASON_CANCELED_RECURRING_BILLING
     * @see REASON_PROBLEM_WITH_REMITTANCE
     * @see REASON_OTHER
     */
    public $reason;

    /**
     * @var string
     * A note.
     */
    public $note;

    /**
     * @var Extensions
     * The extended properties for the dispute. Includes additional information for a dispute category, such as
     * billing disputes, the original transaction ID, and the correct amount.
     */
    public $extensions;

    /**
     * @var array<AccountActivity>
     * An array of customer-reported unauthorized account activities.
     */
    public $disputed_account_activities;

    /**
     * @var array<string>
     * An array of transaction IDs to add to the unauthorized issue.
     */
    public $transaction_ids;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $buyer_requested_amount;

    /**
     * @var array<ItemInfo>
     * The customer purchased items in a disputed transaction.Applicable when the customer changes the dispute reason
     * to <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#merchandise_or_service_not_as_described"><code>MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED</code></a>.
     */
    public $item_info;
}
