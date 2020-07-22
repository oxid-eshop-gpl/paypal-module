<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A merchant request to acknowledge receipt of the disputed item that the customer returned.
 *
 * generated from: request-acknowledge_return_item.json
 */
class AcknowledgeReturnItem implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The merchant provided notes. PayPal can but the consumer cannot view these notes.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $note;
}
