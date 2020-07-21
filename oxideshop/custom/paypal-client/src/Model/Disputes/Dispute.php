<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The dispute details.
 */
class Dispute implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $dispute_id;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $create_time;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $update_time;

    /** @var array<TransactionInfo> */
    public $disputed_transactions;

    /** @var array<AccountActivity> */
    public $disputed_account_activities;

    /**
     * @var string
     * The reason for the item-level dispute. For information about the required information for each dispute reason
     * and associated evidence type, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     */
    public $reason;

    /**
     * @var string
     * The status of the dispute.
     */
    public $status;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $dispute_amount;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $dispute_fee;

    /**
     * @var FeePolicy
     * Policy that determines whether the fee needs to be retained or returned while moving the money as part of
     * dispute process.
     */
    public $fee_policy;

    /** @var string */
    public $external_reason_code;

    /**
     * @var DisputeOutcome
     * The outcome of a dispute.
     */
    public $dispute_outcome;

    /**
     * @var string
     * The stage in the dispute lifecycle.
     */
    public $dispute_life_cycle_stage;

    /**
     * @var string
     * The channel where the customer created the dispute.
     */
    public $dispute_channel;

    /** @var array<Message> */
    public $messages;

    /**
     * @var Extensions
     * The extended properties for the dispute. Includes additional information for a dispute category, such as
     * billing disputes, the original transaction ID, and the correct amount.
     */
    public $extensions;

    /** @var array<Evidence> */
    public $evidences;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $buyer_response_due_date;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $seller_response_due_date;

    /** @var array<History> */
    public $history;

    /**
     * @var string
     * The flow ID for the dispute ID.
     */
    public $dispute_flow;

    /**
     * @var Offer
     * The merchant-proposed offer for a dispute.
     */
    public $offer;

    /**
     * @var RefundDetails
     * The refund details.
     */
    public $refund_details;

    /**
     * @var CommunicationDetails
     * The contact details that a merchant provides to the customer to use to share their evidence documents.
     */
    public $communication_details;

    /** @var array<SupportingInfo> */
    public $supporting_info;

    /** @var array<array> */
    public $links;
}
