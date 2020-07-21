<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The ineligible dispute with the reason for ineligibility.
 */
class IneligibleDisputeReason implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $dispute_reason;

    /** @var string */
    public $ineligibility_reason;
}
