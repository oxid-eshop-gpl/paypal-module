<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The dispute summary information.
 */
class DisputeInfo implements JsonSerializable
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
    const STATUS_OPEN = 'OPEN';
    const STATUS_WAITING_FOR_BUYER_RESPONSE = 'WAITING_FOR_BUYER_RESPONSE';
    const STATUS_WAITING_FOR_SELLER_RESPONSE = 'WAITING_FOR_SELLER_RESPONSE';
    const STATUS_UNDER_REVIEW = 'UNDER_REVIEW';
    const STATUS_RESOLVED = 'RESOLVED';
    const STATUS_OTHER = 'OTHER';
    const DISPUTE_STATE_OPEN_INQUIRIES = 'OPEN_INQUIRIES';
    const DISPUTE_STATE_REQUIRED_ACTION = 'REQUIRED_ACTION';
    const DISPUTE_STATE_REQUIRED_OTHER_PARTY_ACTION = 'REQUIRED_OTHER_PARTY_ACTION';
    const DISPUTE_STATE_UNDER_PAYPAL_REVIEW = 'UNDER_PAYPAL_REVIEW';
    const DISPUTE_STATE_APPEALABLE = 'APPEALABLE';
    const DISPUTE_STATE_RESOLVED = 'RESOLVED';
    const DISPUTE_LIFE_CYCLE_STAGE_INQUIRY = 'INQUIRY';
    const DISPUTE_LIFE_CYCLE_STAGE_CHARGEBACK = 'CHARGEBACK';
    const DISPUTE_LIFE_CYCLE_STAGE_PRE_ARBITRATION = 'PRE_ARBITRATION';
    const DISPUTE_LIFE_CYCLE_STAGE_ARBITRATION = 'ARBITRATION';
    const DISPUTE_CHANNEL_INTERNAL = 'INTERNAL';
    const DISPUTE_CHANNEL_EXTERNAL = 'EXTERNAL';
    const DISPUTE_FLOW_ACH_RETURNS = 'ACH_RETURNS';
    const DISPUTE_FLOW_ACCOUNT_ISSUES = 'ACCOUNT_ISSUES';
    const DISPUTE_FLOW_ADMIN_FRAUD_REVERSAL = 'ADMIN_FRAUD_REVERSAL';
    const DISPUTE_FLOW_BILLING = 'BILLING';
    const DISPUTE_FLOW_CHARGEBACKS = 'CHARGEBACKS';
    const DISPUTE_FLOW_COMPLAINT_RESOLUTION = 'COMPLAINT_RESOLUTION';
    const DISPUTE_FLOW_CORRECTION = 'CORRECTION';
    const DISPUTE_FLOW_DEBIT_CARD_CHARGEBACK = 'DEBIT_CARD_CHARGEBACK';
    const DISPUTE_FLOW_FAX_ROUTING = 'FAX_ROUTING';
    const DISPUTE_FLOW_MIPS_COMPLAINT_ITEM = 'MIPS_COMPLAINT_ITEM';
    const DISPUTE_FLOW_MIPS_COMPLAINT = 'MIPS_COMPLAINT';
    const DISPUTE_FLOW_OPS_VERIFICATION_FLOW = 'OPS_VERIFICATION_FLOW';
    const DISPUTE_FLOW_PAYPAL_DISPUTE_RESOLUTION = 'PAYPAL_DISPUTE_RESOLUTION';
    const DISPUTE_FLOW_PINLESS_DEBIT_RETURN = 'PINLESS_DEBIT_RETURN';
    const DISPUTE_FLOW_PRICING_ADJUSTMENT = 'PRICING_ADJUSTMENT';
    const DISPUTE_FLOW_SPOOF_UNAUTH_CHILD = 'SPOOF_UNAUTH_CHILD';
    const DISPUTE_FLOW_SPOOF_UNAUTH_PARENT = 'SPOOF_UNAUTH_PARENT';
    const DISPUTE_FLOW_THIRD_PARTY_CLAIM = 'THIRD_PARTY_CLAIM';
    const DISPUTE_FLOW_THIRD_PARTY_DISPUTE = 'THIRD_PARTY_DISPUTE';
    const DISPUTE_FLOW_TICKET_RETRIEVAL = 'TICKET_RETRIEVAL';
    const DISPUTE_FLOW_UK_EXPRESS_RETURNS = 'UK_EXPRESS_RETURNS';
    const DISPUTE_FLOW_UNKNOWN_FAXES = 'UNKNOWN_FAXES';
    const DISPUTE_FLOW_VETTING = 'VETTING';
    const DISPUTE_FLOW_OTHER = 'OTHER';

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
     * The status of the dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_OPEN
     * @see STATUS_WAITING_FOR_BUYER_RESPONSE
     * @see STATUS_WAITING_FOR_SELLER_RESPONSE
     * @see STATUS_UNDER_REVIEW
     * @see STATUS_RESOLVED
     * @see STATUS_OTHER
     */
    public $status;

    /**
     * @var string
     * The state of the dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see DISPUTE_STATE_OPEN_INQUIRIES
     * @see DISPUTE_STATE_REQUIRED_ACTION
     * @see DISPUTE_STATE_REQUIRED_OTHER_PARTY_ACTION
     * @see DISPUTE_STATE_UNDER_PAYPAL_REVIEW
     * @see DISPUTE_STATE_APPEALABLE
     * @see DISPUTE_STATE_RESOLVED
     */
    public $dispute_state;

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
     *
     * use one of constants defined in this class to set the value:
     * @see DISPUTE_LIFE_CYCLE_STAGE_INQUIRY
     * @see DISPUTE_LIFE_CYCLE_STAGE_CHARGEBACK
     * @see DISPUTE_LIFE_CYCLE_STAGE_PRE_ARBITRATION
     * @see DISPUTE_LIFE_CYCLE_STAGE_ARBITRATION
     */
    public $dispute_life_cycle_stage;

    /**
     * @var string
     * The channel where the customer created the dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see DISPUTE_CHANNEL_INTERNAL
     * @see DISPUTE_CHANNEL_EXTERNAL
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
     *
     * use one of constants defined in this class to set the value:
     * @see DISPUTE_FLOW_ACH_RETURNS
     * @see DISPUTE_FLOW_ACCOUNT_ISSUES
     * @see DISPUTE_FLOW_ADMIN_FRAUD_REVERSAL
     * @see DISPUTE_FLOW_BILLING
     * @see DISPUTE_FLOW_CHARGEBACKS
     * @see DISPUTE_FLOW_COMPLAINT_RESOLUTION
     * @see DISPUTE_FLOW_CORRECTION
     * @see DISPUTE_FLOW_DEBIT_CARD_CHARGEBACK
     * @see DISPUTE_FLOW_FAX_ROUTING
     * @see DISPUTE_FLOW_MIPS_COMPLAINT_ITEM
     * @see DISPUTE_FLOW_MIPS_COMPLAINT
     * @see DISPUTE_FLOW_OPS_VERIFICATION_FLOW
     * @see DISPUTE_FLOW_PAYPAL_DISPUTE_RESOLUTION
     * @see DISPUTE_FLOW_PINLESS_DEBIT_RETURN
     * @see DISPUTE_FLOW_PRICING_ADJUSTMENT
     * @see DISPUTE_FLOW_SPOOF_UNAUTH_CHILD
     * @see DISPUTE_FLOW_SPOOF_UNAUTH_PARENT
     * @see DISPUTE_FLOW_THIRD_PARTY_CLAIM
     * @see DISPUTE_FLOW_THIRD_PARTY_DISPUTE
     * @see DISPUTE_FLOW_TICKET_RETRIEVAL
     * @see DISPUTE_FLOW_UK_EXPRESS_RETURNS
     * @see DISPUTE_FLOW_UNKNOWN_FAXES
     * @see DISPUTE_FLOW_VETTING
     * @see DISPUTE_FLOW_OTHER
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

    /** @var array<PartnerAction> */
    public $partner_actions;

    /** @var array<SupportingInfo> */
    public $supporting_info;

    /** @var array<array> */
    public $links;
}
