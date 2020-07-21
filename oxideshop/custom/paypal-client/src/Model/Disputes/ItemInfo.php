<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The information for a purchased item in a disputed transaction.
 */
class ItemInfo implements JsonSerializable
{
    use BaseModel;

    const REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED = 'MERCHANDISE_OR_SERVICE_NOT_RECEIVED';
    const REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED = 'MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED';
    const REASON_UNAUTHORISED = 'UNAUTHORISED';
    const REASON_CREDIT_NOT_PROCESSED = 'CREDIT_NOT_PROCESSED';
    const REASON_DUPLICATE_TRANSACTION = 'DUPLICATE_TRANSACTION';
    const REASON_INCORRECT_AMOUNT = 'INCORRECT_AMOUNT';
    const REASON_PAYMENT_BY_OTHER_MEANS = 'PAYMENT_BY_OTHER_MEANS';
    const REASON_CANCELED_RECURRING_BILLING = 'CANCELED_RECURRING_BILLING';
    const REASON_PROBLEM_WITH_REMITTANCE = 'PROBLEM_WITH_REMITTANCE';
    const REASON_OTHER = 'OTHER';

    /** @var string */
    public $item_id;

    /** @var string */
    public $item_description;

    /** @var string */
    public $item_quantity;

    /** @var string */
    public $partner_transaction_id;

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
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $dispute_amount;

    /** @var string */
    public $notes;
}
