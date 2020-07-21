<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The merchant request to send a message to the other party.
 */
class SendMessage implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $message;
}
