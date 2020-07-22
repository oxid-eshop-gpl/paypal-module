<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A resource representing a Facilitator/Partner who facilitates a transaction.
 *
 * generated from: response-facilitator.json
 */
class Facilitator implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The name of the Facilitator.
     */
    public $name;
}
