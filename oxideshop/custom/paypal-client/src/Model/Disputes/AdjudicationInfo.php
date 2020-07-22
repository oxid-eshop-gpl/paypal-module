<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The partner-provided details that were used for adjudication on the partner's side.
 *
 * generated from: referred-adjudication_info.json
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

    /**
     * @var ItemInfo[]
     * An array of items in the transaction that is in dispute.
     */
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

    /**
     * @var Evidence[]
     * An array of partner-submitted evidences, such as tracking information.
     */
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
     * minLength: 1
     * maxLength: 255
     */
    public $dispute_reason;

    /**
     * @var string
     * The reason that the dispute was closed.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $closure_reason;

    /**
     * @var Message[]
     * An array of customer- or merchant-posted messages.
     */
    public $messages;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->dispute_amount) || Assert::isInstanceOf($this->dispute_amount, Money::class, "dispute_amount in AdjudicationInfo must be instance of Money $within");
        !isset($this->dispute_amount) || $this->dispute_amount->validate(AdjudicationInfo::class);
        !isset($this->items) || Assert::isArray($this->items, "items in AdjudicationInfo must be array $within");

                                if (isset($this->items)){
                                    foreach ($this->items as $item) {
                                        $item->validate(AdjudicationInfo::class);
                                    }
                                }

        !isset($this->outcome) || Assert::isInstanceOf($this->outcome, Outcome::class, "outcome in AdjudicationInfo must be instance of Outcome $within");
        !isset($this->outcome) || $this->outcome->validate(AdjudicationInfo::class);
        !isset($this->extensions) || Assert::isInstanceOf($this->extensions, Extensions::class, "extensions in AdjudicationInfo must be instance of Extensions $within");
        !isset($this->extensions) || $this->extensions->validate(AdjudicationInfo::class);
        !isset($this->evidences) || Assert::isArray($this->evidences, "evidences in AdjudicationInfo must be array $within");

                                if (isset($this->evidences)){
                                    foreach ($this->evidences as $item) {
                                        $item->validate(AdjudicationInfo::class);
                                    }
                                }

        !isset($this->dispute_reason) || Assert::minLength($this->dispute_reason, 1, "dispute_reason in AdjudicationInfo must have minlength of 1 $within");
        !isset($this->dispute_reason) || Assert::maxLength($this->dispute_reason, 255, "dispute_reason in AdjudicationInfo must have maxlength of 255 $within");
        !isset($this->closure_reason) || Assert::minLength($this->closure_reason, 1, "closure_reason in AdjudicationInfo must have minlength of 1 $within");
        !isset($this->closure_reason) || Assert::maxLength($this->closure_reason, 2000, "closure_reason in AdjudicationInfo must have maxlength of 2000 $within");
        !isset($this->messages) || Assert::isArray($this->messages, "messages in AdjudicationInfo must be array $within");

                                if (isset($this->messages)){
                                    foreach ($this->messages as $item) {
                                        $item->validate(AdjudicationInfo::class);
                                    }
                                }
    }

    public function __construct()
    {
    }
}
