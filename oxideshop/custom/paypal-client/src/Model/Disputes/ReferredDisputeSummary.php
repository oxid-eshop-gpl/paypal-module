<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The dispute details.
 *
 * generated from: referred-referred_dispute_summary.json
 */
class ReferredDisputeSummary implements JsonSerializable
{
    use BaseModel;

    /** The customer did not receive the merchandise or service. */
    const REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED = 'MERCHANDISE_OR_SERVICE_NOT_RECEIVED';

    /** The customer reports that the merchandise or service is not as described. */
    const REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED = 'MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED';

    /** The dispute is open. */
    const STATUS_OPEN = 'OPEN';

    /** The dispute is resolved. */
    const STATUS_CLOSED = 'CLOSED';

    /** A third-party claim. The dispute requires custom handling. */
    const DISPUTE_FLOW_THIRD_PARTY_CLAIM = 'THIRD_PARTY_CLAIM';

    /** A third-party dispute. The dispute does not require any special handling. Defaults to default procedures. */
    const DISPUTE_FLOW_THIRD_PARTY_DISPUTE = 'THIRD_PARTY_DISPUTE';

    /**
     * @var string
     * The ID of the PayPal-side dispute.
     */
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

    /**
     * @var array<ReferenceDispute>
     * The details about the partner disputes.
     */
    public $reference_disputes;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $dispute_amount;

    /**
     * @var string
     * The reason for the item-level dispute. For information about the required information for each dispute reason
     * and associated evidence type, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     *
     * use one of constants defined in this class to set the value:
     * @see REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED
     * @see REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED
     */
    public $reason;

    /**
     * @var string
     * The dispute status.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_OPEN
     * @see STATUS_CLOSED
     */
    public $status;

    /**
     * @var string
     * The dispute flow name.
     *
     * use one of constants defined in this class to set the value:
     * @see DISPUTE_FLOW_THIRD_PARTY_CLAIM
     * @see DISPUTE_FLOW_THIRD_PARTY_DISPUTE
     */
    public $dispute_flow;

    /**
     * @var array<array>
     * An array of request-related [HATEOAS links](/docs/api/hateoas-links/).
     */
    public $links;
}
