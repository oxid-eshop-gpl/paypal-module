<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A resource representing a Facilitator/Partner who facilitates a transaction.
 */
class Facilitator implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $name;
}
