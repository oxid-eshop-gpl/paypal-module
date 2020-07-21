<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The referred dispute details.
 */
class DisputeCreateRequest implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $dispute_flow;

    /** @var Extensions */
    public $extensions;

    /** @var Transaction */
    public $transaction;

    /** @var ReferenceDispute */
    public $reference_dispute;

    /** @var array */
    public $evidences;

    /** @var string */
    public $reason;

    /** @var string */
    public $sub_reason;

    /** @var array */
    public $messages;
}
