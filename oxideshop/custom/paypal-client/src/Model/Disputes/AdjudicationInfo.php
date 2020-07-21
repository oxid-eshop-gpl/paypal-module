<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The partner-provided details that were used for adjudication on the partner's side.
 */
class AdjudicationInfo implements JsonSerializable
{
    use BaseModel;

    /** The customer did not receive the merchandise or service. */
    const DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED = 'MERCHANDISE_OR_SERVICE_NOT_RECEIVED';

    /** The customer reports that the merchandise or service is not as described. */
    const DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED = 'MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED';

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $dispute_amount;

    /** @var array<ItemInfo> */
    public $items;

    /**
     * @var Outcome
     * The outcome of the dispute case.
     */
    public $outcome;

    /**
     * @var Extensions
     * The extended properties for the dispute. Includes additional information for a dispute category, such as
     * billing disputes, the original transaction ID, correct amount, and so on.
     */
    public $extensions;

    /** @var array<Evidence> */
    public $evidences;

    /**
     * @var string
     * The reason for the item-level dispute. For information about the required information for each dispute reason
     * and associated evidence type, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     *
     * use one of constants defined in this class to set the value:
     * @see DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED
     * @see DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED
     */
    public $dispute_reason;

    /** @var string */
    public $closure_reason;

    /** @var array<Message> */
    public $messages;
}
