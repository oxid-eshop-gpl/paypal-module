<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The dispute summary information.
 *
 * generated from: response-dispute_info.json
 */
class DisputeInfo implements JsonSerializable
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

    /** The dispute is open. */
    const STATUS_OPEN = 'OPEN';

    /** The dispute is waiting for a response from the customer. */
    const STATUS_WAITING_FOR_BUYER_RESPONSE = 'WAITING_FOR_BUYER_RESPONSE';

    /** The dispute is waiting for a response from the merchant. */
    const STATUS_WAITING_FOR_SELLER_RESPONSE = 'WAITING_FOR_SELLER_RESPONSE';

    /** The dispute is under review with PayPal. */
    const STATUS_UNDER_REVIEW = 'UNDER_REVIEW';

    /** The dispute is resolved. */
    const STATUS_RESOLVED = 'RESOLVED';

    /** The default status if the dispute does not have one of the other statuses. */
    const STATUS_OTHER = 'OTHER';

    /** The dispute is open. */
    const DISPUTE_STATE_OPEN_INQUIRIES = 'OPEN_INQUIRIES';

    /** The dispute is waiting for a response. */
    const DISPUTE_STATE_REQUIRED_ACTION = 'REQUIRED_ACTION';

    /** The dispute is waiting for a response from other party. */
    const DISPUTE_STATE_REQUIRED_OTHER_PARTY_ACTION = 'REQUIRED_OTHER_PARTY_ACTION';

    /** The dispute is under review with PayPal. */
    const DISPUTE_STATE_UNDER_PAYPAL_REVIEW = 'UNDER_PAYPAL_REVIEW';

    /** The dispute can be appealed. */
    const DISPUTE_STATE_APPEALABLE = 'APPEALABLE';

    /** The dispute is resolved. */
    const DISPUTE_STATE_RESOLVED = 'RESOLVED';

    /** A customer and merchant interact in an attempt to resolve a dispute without escalation to PayPal. Occurs when the customer:<ul><li>Has not received goods or a service.</li><li>Reports that the received goods or service are not as described.</li><li>Needs more details, such as a copy of the transaction or a receipt.</li></ul> */
    const DISPUTE_LIFE_CYCLE_STAGE_INQUIRY = 'INQUIRY';

    /** A customer or merchant escalates an inquiry to a claim, which authorizes PayPal to investigate the case and make a determination. Occurs only when the dispute channel is <code>INTERNAL</code>. This stage is a PayPal dispute lifecycle stage and not a credit card or debit card chargeback. All notes that the customer sends in this stage are visible to PayPal agents only. The customer must wait for PayPal’s response before the customer can take further action. In this stage, PayPal shares dispute details with the merchant, who can complete one of these actions:<ul><li>Accept the claim.</li><li>Submit evidence to challenge the claim.</li><li>Make an offer to the customer to resolve the claim.</li></ul> */
    const DISPUTE_LIFE_CYCLE_STAGE_CHARGEBACK = 'CHARGEBACK';

    /** The first appeal stage for merchants. A merchant can appeal a chargeback if PayPal's decision is not in the merchant's favor. If the merchant does not appeal within the appeal period, PayPal considers the case resolved. */
    const DISPUTE_LIFE_CYCLE_STAGE_PRE_ARBITRATION = 'PRE_ARBITRATION';

    /** The second appeal stage for merchants. A merchant can appeal a dispute for a second time if the first appeal was denied. If the merchant does not appeal within the appeal period, the case returns to a resolved status in pre-arbitration stage. */
    const DISPUTE_LIFE_CYCLE_STAGE_ARBITRATION = 'ARBITRATION';

    /** The customer contacts PayPal to file a dispute with the merchant. */
    const DISPUTE_CHANNEL_INTERNAL = 'INTERNAL';

    /** The customer contacts their card issuer or bank to request a refund. */
    const DISPUTE_CHANNEL_EXTERNAL = 'EXTERNAL';

    /** ACH returns. */
    const DISPUTE_FLOW_ACH_RETURNS = 'ACH_RETURNS';

    /** Account issues. */
    const DISPUTE_FLOW_ACCOUNT_ISSUES = 'ACCOUNT_ISSUES';

    /** Admin fraud reversal. */
    const DISPUTE_FLOW_ADMIN_FRAUD_REVERSAL = 'ADMIN_FRAUD_REVERSAL';

    /** Billing. */
    const DISPUTE_FLOW_BILLING = 'BILLING';

    /** Charge back. */
    const DISPUTE_FLOW_CHARGEBACKS = 'CHARGEBACKS';

    /** Complaint resolution. */
    const DISPUTE_FLOW_COMPLAINT_RESOLUTION = 'COMPLAINT_RESOLUTION';

    /** Correction. */
    const DISPUTE_FLOW_CORRECTION = 'CORRECTION';

    /** Debit card charge back. */
    const DISPUTE_FLOW_DEBIT_CARD_CHARGEBACK = 'DEBIT_CARD_CHARGEBACK';

    /** FAX routing. */
    const DISPUTE_FLOW_FAX_ROUTING = 'FAX_ROUTING';

    /** MIPS complaint item. */
    const DISPUTE_FLOW_MIPS_COMPLAINT_ITEM = 'MIPS_COMPLAINT_ITEM';

    /** MIPS complaint. */
    const DISPUTE_FLOW_MIPS_COMPLAINT = 'MIPS_COMPLAINT';

    /** OPS verification flow. */
    const DISPUTE_FLOW_OPS_VERIFICATION_FLOW = 'OPS_VERIFICATION_FLOW';

    /** PayPal dispute resolution. */
    const DISPUTE_FLOW_PAYPAL_DISPUTE_RESOLUTION = 'PAYPAL_DISPUTE_RESOLUTION';

    /** Pin-less debit return. */
    const DISPUTE_FLOW_PINLESS_DEBIT_RETURN = 'PINLESS_DEBIT_RETURN';

    /** Pricing adjustment. */
    const DISPUTE_FLOW_PRICING_ADJUSTMENT = 'PRICING_ADJUSTMENT';

    /** Spoof unauthorized child. */
    const DISPUTE_FLOW_SPOOF_UNAUTH_CHILD = 'SPOOF_UNAUTH_CHILD';

    /** Spoof unauthorized parent. */
    const DISPUTE_FLOW_SPOOF_UNAUTH_PARENT = 'SPOOF_UNAUTH_PARENT';

    /** Third-party claim. */
    const DISPUTE_FLOW_THIRD_PARTY_CLAIM = 'THIRD_PARTY_CLAIM';

    /** Third-party dispute. */
    const DISPUTE_FLOW_THIRD_PARTY_DISPUTE = 'THIRD_PARTY_DISPUTE';

    /** Ticket retrieval. */
    const DISPUTE_FLOW_TICKET_RETRIEVAL = 'TICKET_RETRIEVAL';

    /** UK Express returns. */
    const DISPUTE_FLOW_UK_EXPRESS_RETURNS = 'UK_EXPRESS_RETURNS';

    /** Unknown faxes. */
    const DISPUTE_FLOW_UNKNOWN_FAXES = 'UNKNOWN_FAXES';

    /** Vetting. */
    const DISPUTE_FLOW_VETTING = 'VETTING';

    /** Other. */
    const DISPUTE_FLOW_OTHER = 'OTHER';

    /**
     * @var string
     * The ID of the dispute.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $dispute_id;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $update_time;

    /**
     * @var array<TransactionInfo>
     * An array of transactions for which disputes were created.
     */
    public $disputed_transactions;

    /**
     * @var array<AccountActivity>
     * An array of merchant account activities.
     */
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
     * minLength: 1
     * maxLength: 255
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
     * minLength: 1
     * maxLength: 255
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
     * minLength: 1
     * maxLength: 255
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

    /**
     * @var string
     * The code that identifies the reason for the credit card chargeback. Each card issuer follows their own
     * standards for defining reason type, code, and its format. For more details about the external reason code, see
     * the card issue site. Available for only unbranded transactions.
     *
     * minLength: 1
     * maxLength: 2000
     */
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
     * minLength: 1
     * maxLength: 255
     */
    public $dispute_life_cycle_stage;

    /**
     * @var string
     * The channel where the customer created the dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see DISPUTE_CHANNEL_INTERNAL
     * @see DISPUTE_CHANNEL_EXTERNAL
     * minLength: 1
     * maxLength: 255
     */
    public $dispute_channel;

    /**
     * @var array<Message>
     * An array of customer- or merchant-posted messages for the dispute.
     */
    public $messages;

    /**
     * @var Extensions
     * The extended properties for the dispute. Includes additional information for a dispute category, such as
     * billing disputes, the original transaction ID, and the correct amount.
     */
    public $extensions;

    /**
     * @var array<Evidence>
     * An array of evidence documents.
     */
    public $evidences;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $buyer_response_due_date;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $seller_response_due_date;

    /**
     * @var array<History>
     * An array of history objects.
     */
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
     * minLength: 1
     * maxLength: 255
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

    /**
     * @var array<PartnerAction>
     * An array of all the actions that are associated to this dispute.
     */
    public $partner_actions;

    /**
     * @var array<SupportingInfo>
     * An array of all the supporting information that are associated to this dispute.
     */
    public $supporting_info;

    /**
     * @var array<array>
     * An array of request-related [HATEOAS links](/docs/api/hateoas-links/).
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->dispute_id) || Assert::minLength($this->dispute_id, 1, "dispute_id in DisputeInfo must have minlength of 1 $within");
        !isset($this->dispute_id) || Assert::maxLength($this->dispute_id, 255, "dispute_id in DisputeInfo must have maxlength of 255 $within");
        !isset($this->create_time) || Assert::minLength($this->create_time, 20, "create_time in DisputeInfo must have minlength of 20 $within");
        !isset($this->create_time) || Assert::maxLength($this->create_time, 64, "create_time in DisputeInfo must have maxlength of 64 $within");
        !isset($this->update_time) || Assert::minLength($this->update_time, 20, "update_time in DisputeInfo must have minlength of 20 $within");
        !isset($this->update_time) || Assert::maxLength($this->update_time, 64, "update_time in DisputeInfo must have maxlength of 64 $within");
        !isset($this->disputed_transactions) || Assert::isArray($this->disputed_transactions, "disputed_transactions in DisputeInfo must be array $within");

                                if (isset($this->disputed_transactions)){
                                    foreach ($this->disputed_transactions as $item) {
                                        $item->validate(DisputeInfo::class);
                                    }
                                }

        !isset($this->disputed_account_activities) || Assert::isArray($this->disputed_account_activities, "disputed_account_activities in DisputeInfo must be array $within");

                                if (isset($this->disputed_account_activities)){
                                    foreach ($this->disputed_account_activities as $item) {
                                        $item->validate(DisputeInfo::class);
                                    }
                                }

        !isset($this->reason) || Assert::minLength($this->reason, 1, "reason in DisputeInfo must have minlength of 1 $within");
        !isset($this->reason) || Assert::maxLength($this->reason, 255, "reason in DisputeInfo must have maxlength of 255 $within");
        !isset($this->status) || Assert::minLength($this->status, 1, "status in DisputeInfo must have minlength of 1 $within");
        !isset($this->status) || Assert::maxLength($this->status, 255, "status in DisputeInfo must have maxlength of 255 $within");
        !isset($this->dispute_state) || Assert::minLength($this->dispute_state, 1, "dispute_state in DisputeInfo must have minlength of 1 $within");
        !isset($this->dispute_state) || Assert::maxLength($this->dispute_state, 255, "dispute_state in DisputeInfo must have maxlength of 255 $within");
        !isset($this->dispute_amount) || Assert::isInstanceOf($this->dispute_amount, Money::class, "dispute_amount in DisputeInfo must be instance of Money $within");
        !isset($this->dispute_amount) || $this->dispute_amount->validate(DisputeInfo::class);
        !isset($this->dispute_fee) || Assert::isInstanceOf($this->dispute_fee, Money::class, "dispute_fee in DisputeInfo must be instance of Money $within");
        !isset($this->dispute_fee) || $this->dispute_fee->validate(DisputeInfo::class);
        !isset($this->external_reason_code) || Assert::minLength($this->external_reason_code, 1, "external_reason_code in DisputeInfo must have minlength of 1 $within");
        !isset($this->external_reason_code) || Assert::maxLength($this->external_reason_code, 2000, "external_reason_code in DisputeInfo must have maxlength of 2000 $within");
        !isset($this->dispute_outcome) || Assert::isInstanceOf($this->dispute_outcome, DisputeOutcome::class, "dispute_outcome in DisputeInfo must be instance of DisputeOutcome $within");
        !isset($this->dispute_outcome) || $this->dispute_outcome->validate(DisputeInfo::class);
        !isset($this->dispute_life_cycle_stage) || Assert::minLength($this->dispute_life_cycle_stage, 1, "dispute_life_cycle_stage in DisputeInfo must have minlength of 1 $within");
        !isset($this->dispute_life_cycle_stage) || Assert::maxLength($this->dispute_life_cycle_stage, 255, "dispute_life_cycle_stage in DisputeInfo must have maxlength of 255 $within");
        !isset($this->dispute_channel) || Assert::minLength($this->dispute_channel, 1, "dispute_channel in DisputeInfo must have minlength of 1 $within");
        !isset($this->dispute_channel) || Assert::maxLength($this->dispute_channel, 255, "dispute_channel in DisputeInfo must have maxlength of 255 $within");
        !isset($this->messages) || Assert::isArray($this->messages, "messages in DisputeInfo must be array $within");

                                if (isset($this->messages)){
                                    foreach ($this->messages as $item) {
                                        $item->validate(DisputeInfo::class);
                                    }
                                }

        !isset($this->extensions) || Assert::isInstanceOf($this->extensions, Extensions::class, "extensions in DisputeInfo must be instance of Extensions $within");
        !isset($this->extensions) || $this->extensions->validate(DisputeInfo::class);
        !isset($this->evidences) || Assert::isArray($this->evidences, "evidences in DisputeInfo must be array $within");

                                if (isset($this->evidences)){
                                    foreach ($this->evidences as $item) {
                                        $item->validate(DisputeInfo::class);
                                    }
                                }

        !isset($this->buyer_response_due_date) || Assert::minLength($this->buyer_response_due_date, 20, "buyer_response_due_date in DisputeInfo must have minlength of 20 $within");
        !isset($this->buyer_response_due_date) || Assert::maxLength($this->buyer_response_due_date, 64, "buyer_response_due_date in DisputeInfo must have maxlength of 64 $within");
        !isset($this->seller_response_due_date) || Assert::minLength($this->seller_response_due_date, 20, "seller_response_due_date in DisputeInfo must have minlength of 20 $within");
        !isset($this->seller_response_due_date) || Assert::maxLength($this->seller_response_due_date, 64, "seller_response_due_date in DisputeInfo must have maxlength of 64 $within");
        !isset($this->history) || Assert::isArray($this->history, "history in DisputeInfo must be array $within");

                                if (isset($this->history)){
                                    foreach ($this->history as $item) {
                                        $item->validate(DisputeInfo::class);
                                    }
                                }

        !isset($this->dispute_flow) || Assert::minLength($this->dispute_flow, 1, "dispute_flow in DisputeInfo must have minlength of 1 $within");
        !isset($this->dispute_flow) || Assert::maxLength($this->dispute_flow, 255, "dispute_flow in DisputeInfo must have maxlength of 255 $within");
        !isset($this->offer) || Assert::isInstanceOf($this->offer, Offer::class, "offer in DisputeInfo must be instance of Offer $within");
        !isset($this->offer) || $this->offer->validate(DisputeInfo::class);
        !isset($this->refund_details) || Assert::isInstanceOf($this->refund_details, RefundDetails::class, "refund_details in DisputeInfo must be instance of RefundDetails $within");
        !isset($this->refund_details) || $this->refund_details->validate(DisputeInfo::class);
        !isset($this->communication_details) || Assert::isInstanceOf($this->communication_details, CommunicationDetails::class, "communication_details in DisputeInfo must be instance of CommunicationDetails $within");
        !isset($this->communication_details) || $this->communication_details->validate(DisputeInfo::class);
        !isset($this->partner_actions) || Assert::isArray($this->partner_actions, "partner_actions in DisputeInfo must be array $within");

                                if (isset($this->partner_actions)){
                                    foreach ($this->partner_actions as $item) {
                                        $item->validate(DisputeInfo::class);
                                    }
                                }

        !isset($this->supporting_info) || Assert::isArray($this->supporting_info, "supporting_info in DisputeInfo must be array $within");

                                if (isset($this->supporting_info)){
                                    foreach ($this->supporting_info as $item) {
                                        $item->validate(DisputeInfo::class);
                                    }
                                }

        !isset($this->links) || Assert::isArray($this->links, "links in DisputeInfo must be array $within");
    }

    public function __construct()
    {
    }
}
