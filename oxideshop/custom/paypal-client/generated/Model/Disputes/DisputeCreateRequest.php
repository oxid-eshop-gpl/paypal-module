<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The referred dispute details.
 *
 * generated from: referred-dispute_create_request.json
 */
class DisputeCreateRequest implements JsonSerializable
{
    use BaseModel;

    /** Third-party claim information that the dispute requires custom handling. */
    public const DISPUTE_FLOW_THIRD_PARTY_CLAIM = 'THIRD_PARTY_CLAIM';

    /** Third-party claim information that the dispute does not require any special handling. Defaults to default procedures. */
    public const DISPUTE_FLOW_THIRD_PARTY_DISPUTE = 'THIRD_PARTY_DISPUTE';

    /** The customer did not receive the merchandise or service. */
    public const REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED = 'MERCHANDISE_OR_SERVICE_NOT_RECEIVED';

    /** The customer reports that the merchandise or service is not as described. */
    public const REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED = 'MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED';

    /** The order is incomplete. It has missing parts or an incorrect quantity. */
    public const SUB_REASON_INCOMPLETE_ORDER = 'INCOMPLETE_ORDER';

    /** The goods are damaged. */
    public const SUB_REASON_DAMAGED = 'DAMAGED';

    /** The item is fake. */
    public const SUB_REASON_FAKE = 'FAKE';

    /** The item is materially different. It is a different item, the wrong size or model,the wrong color, or used instead of new. */
    public const SUB_REASON_MATERIALLY_DIFFERENT = 'MATERIALLY_DIFFERENT';

    /** The item is unusable or ruined. */
    public const SUB_REASON_UNUSABLE = 'UNUSABLE';

    /** The surcharge is incorrect. */
    public const SUB_REASON_EXCESSIVE_SURCHARGE = 'EXCESSIVE_SURCHARGE';

    /**
     * The flow ID for the dispute being created.
     *
     * use one of constants defined in this class to set the value:
     * @see DISPUTE_FLOW_THIRD_PARTY_CLAIM
     * @see DISPUTE_FLOW_THIRD_PARTY_DISPUTE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $dispute_flow;

    /**
     * The extended properties for the dispute. Includes additional information for a dispute category, such as
     * billing disputes, the original transaction ID, correct amount, and so on.
     *
     * @var Extensions2 | null
     */
    public $extensions;

    /**
     * The transaction for which to create a case.
     *
     * @var Transaction
     */
    public $transaction;

    /**
     * The details about the partner dispute.
     *
     * @var ReferenceDispute
     */
    public $reference_dispute;

    /**
     * An array of partner-submitted evidence documents, such as tracking information.
     *
     * @var Evidence2[] | null
     */
    public $evidences;

    /**
     * The reason for the item-level dispute. For information about the required information for each dispute reason
     * and associated evidence type, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     *
     * use one of constants defined in this class to set the value:
     * @see REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED
     * @see REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $reason;

    /**
     * The dispute sub-reason.
     *
     * use one of constants defined in this class to set the value:
     * @see SUB_REASON_INCOMPLETE_ORDER
     * @see SUB_REASON_DAMAGED
     * @see SUB_REASON_FAKE
     * @see SUB_REASON_MATERIALLY_DIFFERENT
     * @see SUB_REASON_UNUSABLE
     * @see SUB_REASON_EXCESSIVE_SURCHARGE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $sub_reason;

    /**
     * An array of customer- or merchant-posted messages.
     *
     * @var Message2[] | null
     */
    public $messages;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->dispute_flow) || Assert::minLength(
            $this->dispute_flow,
            1,
            "dispute_flow in DisputeCreateRequest must have minlength of 1 $within"
        );
        !isset($this->dispute_flow) || Assert::maxLength(
            $this->dispute_flow,
            255,
            "dispute_flow in DisputeCreateRequest must have maxlength of 255 $within"
        );
        !isset($this->extensions) || Assert::isInstanceOf(
            $this->extensions,
            Extensions2::class,
            "extensions in DisputeCreateRequest must be instance of Extensions2 $within"
        );
        !isset($this->extensions) ||  $this->extensions->validate(DisputeCreateRequest::class);
        Assert::notNull($this->transaction, "transaction in DisputeCreateRequest must not be NULL $within");
        Assert::isInstanceOf(
            $this->transaction,
            Transaction::class,
            "transaction in DisputeCreateRequest must be instance of Transaction $within"
        );
         $this->transaction->validate(DisputeCreateRequest::class);
        Assert::notNull($this->reference_dispute, "reference_dispute in DisputeCreateRequest must not be NULL $within");
        Assert::isInstanceOf(
            $this->reference_dispute,
            ReferenceDispute::class,
            "reference_dispute in DisputeCreateRequest must be instance of ReferenceDispute $within"
        );
         $this->reference_dispute->validate(DisputeCreateRequest::class);
        !isset($this->evidences) || Assert::isArray(
            $this->evidences,
            "evidences in DisputeCreateRequest must be array $within"
        );
        if (isset($this->evidences)) {
            foreach ($this->evidences as $item) {
                $item->validate(DisputeCreateRequest::class);
            }
        }
        !isset($this->reason) || Assert::minLength(
            $this->reason,
            1,
            "reason in DisputeCreateRequest must have minlength of 1 $within"
        );
        !isset($this->reason) || Assert::maxLength(
            $this->reason,
            255,
            "reason in DisputeCreateRequest must have maxlength of 255 $within"
        );
        !isset($this->sub_reason) || Assert::minLength(
            $this->sub_reason,
            1,
            "sub_reason in DisputeCreateRequest must have minlength of 1 $within"
        );
        !isset($this->sub_reason) || Assert::maxLength(
            $this->sub_reason,
            255,
            "sub_reason in DisputeCreateRequest must have maxlength of 255 $within"
        );
        !isset($this->messages) || Assert::isArray(
            $this->messages,
            "messages in DisputeCreateRequest must be array $within"
        );
        if (isset($this->messages)) {
            foreach ($this->messages as $item) {
                $item->validate(DisputeCreateRequest::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['dispute_flow'])) {
            $this->dispute_flow = $data['dispute_flow'];
        }
        if (isset($data['extensions'])) {
            $this->extensions = new Extensions2($data['extensions']);
        }
        if (isset($data['transaction'])) {
            $this->transaction = new Transaction($data['transaction']);
        }
        if (isset($data['reference_dispute'])) {
            $this->reference_dispute = new ReferenceDispute($data['reference_dispute']);
        }
        if (isset($data['evidences'])) {
            $this->evidences = [];
            foreach ($data['evidences'] as $item) {
                $this->evidences[] = new Evidence2($item);
            }
        }
        if (isset($data['reason'])) {
            $this->reason = $data['reason'];
        }
        if (isset($data['sub_reason'])) {
            $this->sub_reason = $data['sub_reason'];
        }
        if (isset($data['messages'])) {
            $this->messages = [];
            foreach ($data['messages'] as $item) {
                $this->messages[] = new Message2($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->transaction = new Transaction();
        $this->reference_dispute = new ReferenceDispute();
        if (isset($data)) {
            $this->map($data);
        }
    }
}
