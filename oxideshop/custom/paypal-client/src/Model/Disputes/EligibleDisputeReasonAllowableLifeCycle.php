<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details about the allowable lifecycle stage and the reason why it is allowed.
 *
 * generated from: EligibleDisputeReason_allowable_life_cycle
 */
class EligibleDisputeReasonAllowableLifeCycle implements JsonSerializable
{
    use BaseModel;

    /** Dispute is allowed in the <code>INQUIRY</code> lifecycle stage. */
    const STAGE_INQUIRY = 'INQUIRY';

    /** Dispute is allowed in the <code>CHARGEBACK</code> lifecycle stage. */
    const STAGE_CHARGEBACK = 'CHARGEBACK';

    /**
     * @var string
     * The stage in the dispute life cycle where the dispute creation is allowed.
     *
     * use one of constants defined in this class to set the value:
     * @see STAGE_INQUIRY
     * @see STAGE_CHARGEBACK
     */
    public $stage;

    /**
     * @var string
     * The reason why dispute creation is allowed in this lifecycle stage. Value is `SELLER_OPTED_OUT_OF_DISPUTE`,
     * `LOCKED_SELLER`, `RESTRICTED_SELLER`, or `DISPUTE_DISABLED_PARTNER`.
     */
    public $reason;
}