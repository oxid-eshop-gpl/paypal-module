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
     */
    public $message;
}
