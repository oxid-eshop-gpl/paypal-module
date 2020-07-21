<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The merchant request to send a message to the other party.
 */
class SendMessage implements \JsonSerializable
{
    /** @var string */
    public $message;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
