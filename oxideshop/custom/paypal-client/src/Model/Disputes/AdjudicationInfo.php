<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The partner-provided details that were used for adjudication on the partner's side.
 */
class AdjudicationInfo implements \JsonSerializable
{
    /** @var Money */
    public $dispute_amount;

    /** @var array */
    public $items;

    /** @var Outcome */
    public $outcome;

    /** @var Extensions */
    public $extensions;

    /** @var array */
    public $evidences;

    /** @var string */
    public $dispute_reason;

    /** @var string */
    public $closure_reason;

    /** @var array */
    public $messages;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
