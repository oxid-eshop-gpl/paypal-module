<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The eligible and ineligible disputes with reasons.
 *
 * generated from: response-dispute_eligibility.json
 */
class DisputeEligibility implements JsonSerializable
{
    use BaseModel;

    /** The customer did not receive the merchandise or service. */
    public const RECOMMENDED_DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED = 'MERCHANDISE_OR_SERVICE_NOT_RECEIVED';

    /** The customer reports that the merchandise or service is not as described. */
    public const RECOMMENDED_DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED = 'MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED';

    /** The customer did not authorize purchase of the merchandise or service. */
    public const RECOMMENDED_DISPUTE_REASON_UNAUTHORISED = 'UNAUTHORISED';

    /** The refund or credit was not processed for the customer. */
    public const RECOMMENDED_DISPUTE_REASON_CREDIT_NOT_PROCESSED = 'CREDIT_NOT_PROCESSED';

    /** The transaction was a duplicate. */
    public const RECOMMENDED_DISPUTE_REASON_DUPLICATE_TRANSACTION = 'DUPLICATE_TRANSACTION';

    /** The customer was charged an incorrect amount. */
    public const RECOMMENDED_DISPUTE_REASON_INCORRECT_AMOUNT = 'INCORRECT_AMOUNT';

    /** The customer paid for the transaction through other means. */
    public const RECOMMENDED_DISPUTE_REASON_PAYMENT_BY_OTHER_MEANS = 'PAYMENT_BY_OTHER_MEANS';

    /** The customer was being charged for a subscription or a recurring transaction that was canceled. */
    public const RECOMMENDED_DISPUTE_REASON_CANCELED_RECURRING_BILLING = 'CANCELED_RECURRING_BILLING';

    /** A problem occurred with the remittance. */
    public const RECOMMENDED_DISPUTE_REASON_PROBLEM_WITH_REMITTANCE = 'PROBLEM_WITH_REMITTANCE';

    /** Other. */
    public const RECOMMENDED_DISPUTE_REASON_OTHER = 'OTHER';

    /**
     * The seller transaction ID that is associated with the encrypted transaction ID that is passed in the request.
     * The dispute creation is allowed on the buyer transaction ID, which must be passed in the create dispute call.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $seller_transaction_id;

    /**
     * The buyer transaction ID that is associated with the `encrypted_transaction_id` passed in the request.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $buyer_transaction_id;

    /**
     * An array of the eligible disputes with reasons.
     *
     * @var EligibleDisputeReason[]
     * maxItems: 0
     */
    public $eligible_dispute_reasons;

    /**
     * An array of the ineligible disputes with ineligibility reasons.
     *
     * @var IneligibleDisputeReason[]
     * maxItems: 0
     */
    public $ineligible_dispute_reasons;

    /**
     * The reason for the item-level dispute. For information about the required information for each dispute reason
     * and associated evidence type, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     *
     * use one of constants defined in this class to set the value:
     * @see RECOMMENDED_DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED
     * @see RECOMMENDED_DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED
     * @see RECOMMENDED_DISPUTE_REASON_UNAUTHORISED
     * @see RECOMMENDED_DISPUTE_REASON_CREDIT_NOT_PROCESSED
     * @see RECOMMENDED_DISPUTE_REASON_DUPLICATE_TRANSACTION
     * @see RECOMMENDED_DISPUTE_REASON_INCORRECT_AMOUNT
     * @see RECOMMENDED_DISPUTE_REASON_PAYMENT_BY_OTHER_MEANS
     * @see RECOMMENDED_DISPUTE_REASON_CANCELED_RECURRING_BILLING
     * @see RECOMMENDED_DISPUTE_REASON_PROBLEM_WITH_REMITTANCE
     * @see RECOMMENDED_DISPUTE_REASON_OTHER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $recommended_dispute_reason;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->seller_transaction_id) || Assert::minLength(
            $this->seller_transaction_id,
            1,
            "seller_transaction_id in DisputeEligibility must have minlength of 1 $within"
        );
        !isset($this->seller_transaction_id) || Assert::maxLength(
            $this->seller_transaction_id,
            255,
            "seller_transaction_id in DisputeEligibility must have maxlength of 255 $within"
        );
        !isset($this->buyer_transaction_id) || Assert::minLength(
            $this->buyer_transaction_id,
            1,
            "buyer_transaction_id in DisputeEligibility must have minlength of 1 $within"
        );
        !isset($this->buyer_transaction_id) || Assert::maxLength(
            $this->buyer_transaction_id,
            255,
            "buyer_transaction_id in DisputeEligibility must have maxlength of 255 $within"
        );
        Assert::notNull($this->eligible_dispute_reasons, "eligible_dispute_reasons in DisputeEligibility must not be NULL $within");
        Assert::minCount(
            $this->eligible_dispute_reasons,
            0,
            "eligible_dispute_reasons in DisputeEligibility must have min. count of 0 $within"
        );
        Assert::isArray(
            $this->eligible_dispute_reasons,
            "eligible_dispute_reasons in DisputeEligibility must be array $within"
        );

        if (isset($this->eligible_dispute_reasons)) {
            foreach ($this->eligible_dispute_reasons as $item) {
                $item->validate(DisputeEligibility::class);
            }
        }

        Assert::notNull($this->ineligible_dispute_reasons, "ineligible_dispute_reasons in DisputeEligibility must not be NULL $within");
        Assert::minCount(
            $this->ineligible_dispute_reasons,
            0,
            "ineligible_dispute_reasons in DisputeEligibility must have min. count of 0 $within"
        );
        Assert::isArray(
            $this->ineligible_dispute_reasons,
            "ineligible_dispute_reasons in DisputeEligibility must be array $within"
        );

        if (isset($this->ineligible_dispute_reasons)) {
            foreach ($this->ineligible_dispute_reasons as $item) {
                $item->validate(DisputeEligibility::class);
            }
        }

        !isset($this->recommended_dispute_reason) || Assert::minLength(
            $this->recommended_dispute_reason,
            1,
            "recommended_dispute_reason in DisputeEligibility must have minlength of 1 $within"
        );
        !isset($this->recommended_dispute_reason) || Assert::maxLength(
            $this->recommended_dispute_reason,
            255,
            "recommended_dispute_reason in DisputeEligibility must have maxlength of 255 $within"
        );
    }

    public function __construct()
    {
        $this->eligible_dispute_reasons = [];
        $this->ineligible_dispute_reasons = [];
    }
}
