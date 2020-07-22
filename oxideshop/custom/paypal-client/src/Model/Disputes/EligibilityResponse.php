<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The eligible and ineligible disputes with reasons. Disputes and refund information are returned, if
 * applicable.
 *
 * generated from: referred-eligibility_response.json
 */
class EligibilityResponse implements JsonSerializable
{
    use BaseModel;

    /** @var boolean */
    public $eligible;

    /** @var string */
    public $allowable_life_cycle;

    /** @var string */
    public $ineligibility_reason;

    /** @var array<ExistingDispute> */
    public $existing_disputes;

    /** @var array<RefundTransaction> */
    public $existing_refunds;
}
