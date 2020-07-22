<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The merchant request to send a message to the other party.
 *
 * generated from: request-send_message.json
 */
class SendMessage implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The message sent by the merchant to the other party.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $message;

    public function validate()
    {
        assert(!isset($this->message) || strlen($this->message) >= 1);
        assert(!isset($this->message) || strlen($this->message) <= 2000);
    }
}
