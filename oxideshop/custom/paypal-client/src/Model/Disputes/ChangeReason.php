<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A request to change the reason for a dispute.
 */
class ChangeReason implements JsonSerializable
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

    /**
     * @var string
     * The reason for the item-level dispute. For information about the required information for each dispute reason
     * and associated evidence type, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     */
    public $reason;

    /** @var string */
    public $note;

    /**
     * @var Extensions
     * The extended properties for the dispute. Includes additional information for a dispute category, such as
     * billing disputes, the original transaction ID, and the correct amount.
     */
    public $extensions;

    /** @var array<AccountActivity> */
    public $disputed_account_activities;

    /** @var array */
    public $transaction_ids;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $buyer_requested_amount;

    /** @var array<ItemInfo> */
    public $item_info;
}
