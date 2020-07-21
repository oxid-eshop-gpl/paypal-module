<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The ineligible dispute with the reason for ineligibility.
 */
class IneligibleDisputeReason implements \JsonSerializable
{
    /** @var string */
    public $dispute_reason;

    /** @var string */
    public $ineligibility_reason;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
