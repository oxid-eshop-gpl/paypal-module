<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The eligible and ineligible disputes with reasons. Disputes and refund information are returned, if applicable.
 */
class EligibilityResponse implements \JsonSerializable
{
    use BaseModel;

    /** @var boolean */
    public $eligible;

    /** @var string */
    public $allowable_life_cycle;

    /** @var string */
    public $ineligibility_reason;

    /** @var array */
    public $existing_disputes;

    /** @var array */
    public $existing_refunds;
}
