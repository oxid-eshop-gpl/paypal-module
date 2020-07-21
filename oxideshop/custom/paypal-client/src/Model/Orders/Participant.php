<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Participant in a payment activity, one of person or business must be provided.
 */
class Participant extends Account implements JsonSerializable
{
    use BaseModel;

    /** @var Person */
    public $person;

    /** @var Business */
    public $business;
}
