<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The dispute details.
 */
class ReferredDisputeSummary implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $dispute_id;

    /** @var string */
    public $create_time;

    /** @var string */
    public $update_time;

    /** @var array<ReferenceDispute> */
    public $reference_disputes;

    /** @var Money */
    public $dispute_amount;

    /** @var string */
    public $reason;

    /** @var string */
    public $status;

    /** @var string */
    public $dispute_flow;

    /** @var array<array> */
    public $links;
}
