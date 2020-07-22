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

    /** @var string */
    public $stage;

    /** @var string */
    public $reason;
}
