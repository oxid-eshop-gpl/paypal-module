<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The outcome of a dispute.
 */
class DisputeOutcome implements \JsonSerializable
{
    /** @var string */
    public $outcome_code;

    /** @var string */
    public $outcome_reason;

    /** @var Money */
    public $amount_refunded;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
