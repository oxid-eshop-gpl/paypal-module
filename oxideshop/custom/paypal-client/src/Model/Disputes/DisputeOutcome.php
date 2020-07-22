<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The outcome of a dispute.
 *
 * generated from: response-dispute_outcome.json
 */
class DisputeOutcome implements JsonSerializable
{
    use BaseModel;

    /** The dispute was resolved in the customer's favor. */
    const OUTCOME_CODE_RESOLVED_BUYER_FAVOUR = 'RESOLVED_BUYER_FAVOUR';

    /** The dispute was resolved in the merchant's favor. */
    const OUTCOME_CODE_RESOLVED_SELLER_FAVOUR = 'RESOLVED_SELLER_FAVOUR';

    /** PayPal provided the merchant or customer with protection and the case is resolved. */
    const OUTCOME_CODE_RESOLVED_WITH_PAYOUT = 'RESOLVED_WITH_PAYOUT';

    /** The customer canceled the dispute. */
    const OUTCOME_CODE_CANCELED_BY_BUYER = 'CANCELED_BY_BUYER';

    /** PayPal accepted the dispute. */
    const OUTCOME_CODE_ACCEPTED = 'ACCEPTED';

    /** PayPal denied the dispute. */
    const OUTCOME_CODE_DENIED = 'DENIED';

    /** A dispute was created for the same transaction ID, and the previous dispute was closed without any decision. */
    const OUTCOME_CODE_NONE = 'NONE';

    /**
     * @var string
     * The outcome of a resolved dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see OUTCOME_CODE_RESOLVED_BUYER_FAVOUR
     * @see OUTCOME_CODE_RESOLVED_SELLER_FAVOUR
     * @see OUTCOME_CODE_RESOLVED_WITH_PAYOUT
     * @see OUTCOME_CODE_CANCELED_BY_BUYER
     * @see OUTCOME_CODE_ACCEPTED
     * @see OUTCOME_CODE_DENIED
     * @see OUTCOME_CODE_NONE
     */
    public $outcome_code;

    /**
     * @var string
     * The justification for the adjudication outcome.
     */
    public $outcome_reason;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount_refunded;
}