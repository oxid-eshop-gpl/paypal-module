<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * A customer- or merchant-posted message for the dispute.
 */
class Message implements \JsonSerializable
{
    /** @var string */
    public $posted_by;

    /** @var string */
    public $time_posted;

    /** @var string */
    public $content;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
