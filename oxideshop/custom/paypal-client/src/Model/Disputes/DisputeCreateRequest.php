<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The referred dispute details.
 */
class DisputeCreateRequest implements JsonSerializable
{
    use BaseModel;

    const DISPUTE_FLOW_THIRD_PARTY_CLAIM = 'THIRD_PARTY_CLAIM';
    const DISPUTE_FLOW_THIRD_PARTY_DISPUTE = 'THIRD_PARTY_DISPUTE';
    const REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED = 'MERCHANDISE_OR_SERVICE_NOT_RECEIVED';
    const REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED = 'MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED';
    const SUB_REASON_INCOMPLETE_ORDER = 'INCOMPLETE_ORDER';
    const SUB_REASON_DAMAGED = 'DAMAGED';
    const SUB_REASON_FAKE = 'FAKE';
    const SUB_REASON_MATERIALLY_DIFFERENT = 'MATERIALLY_DIFFERENT';
    const SUB_REASON_UNUSABLE = 'UNUSABLE';
    const SUB_REASON_EXCESSIVE_SURCHARGE = 'EXCESSIVE_SURCHARGE';

    /**
     * @var string
     * The flow ID for the dispute being created.
     */
    public $dispute_flow;

    /**
     * @var Extensions
     * The extended properties for the dispute. Includes additional information for a dispute category, such as
     * billing disputes, the original transaction ID, correct amount, and so on.
     */
    public $extensions;

    /**
     * @var Transaction
     * The transaction for which to create a case.
     */
    public $transaction;

    /**
     * @var ReferenceDispute
     * The details about the partner dispute.
     */
    public $reference_dispute;

    /** @var array<Evidence> */
    public $evidences;

    /**
     * @var string
     * The reason for the item-level dispute. For information about the required information for each dispute reason
     * and associated evidence type, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     */
    public $reason;

    /**
     * @var string
     * The dispute sub-reason.
     */
    public $sub_reason;

    /** @var array<Message> */
    public $messages;
}
