<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Sandbox only. Updates the state of a dispute, by ID, to either <code>WAITING_FOR_BUYER_RESPONSE</code> or
 * <code>WAITING_FOR_SELLER_RESPONSE</code>. This state change enables either the customer or merchant to submit
 * evidence for the dispute. Specify an <code>action</code> value in the JSON request body to indicate whether
 * the state change enables the customer or merchant to submit evidence.
 *
 * generated from: request-require_evidence.json
 */
class RequireEvidence implements JsonSerializable
{
    use BaseModel;

    /** Changes the status of the dispute to <code>WAITING_FOR_BUYER_RESPONSE</code>. */
    const ACTION_BUYER_EVIDENCE = 'BUYER_EVIDENCE';

    /** Changes the status of the dispute to <code>WAITING_FOR_SELLER_RESPONSE</code>. */
    const ACTION_SELLER_EVIDENCE = 'SELLER_EVIDENCE';

    /**
     * @var string
     * The action. Indicates whether the state change enables the customer or merchant to submit evidence.
     *
     * use one of constants defined in this class to set the value:
     * @see ACTION_BUYER_EVIDENCE
     * @see ACTION_SELLER_EVIDENCE
     */
    public $action;
}
