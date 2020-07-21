<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The history of the dispute.
 */
class History implements \JsonSerializable
{
    /** @var string */
    public $date;

    /** @var string */
    public $actor;

    /** @var string */
    public $event_type;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
