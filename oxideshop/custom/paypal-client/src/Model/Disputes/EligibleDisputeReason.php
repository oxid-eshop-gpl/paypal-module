<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The eligible dispute reason.
 */
class EligibleDisputeReason implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $dispute_reason;

    /** @var OxidProfessionalServices\PayPal\Api\Model\Disputes\EligibleDisputeReasonAllowableLifeCycle */
    public $allowable_life_cycle;
}
