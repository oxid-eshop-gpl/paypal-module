<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The ineligible dispute with the reason for ineligibility.
 */
class IneligibleDisputeReason implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The reason for the item-level dispute. For information about the required information for each dispute reason
     * and associated evidence type, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     */
    public $dispute_reason;

    /** @var string */
    public $ineligibility_reason;
}
