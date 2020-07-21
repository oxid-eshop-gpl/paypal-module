<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The partner-provided details that were used for adjudication on the partner's side.
 */
class AdjudicationInfo implements JsonSerializable
{
    use BaseModel;

    /** @var Money */
    public $dispute_amount;

    /** @var array<ItemInfo> */
    public $items;

    /** @var Outcome */
    public $outcome;

    /** @var Extensions */
    public $extensions;

    /** @var array<Evidence> */
    public $evidences;

    /** @var string */
    public $dispute_reason;

    /** @var string */
    public $closure_reason;

    /** @var array<Message> */
    public $messages;
}
