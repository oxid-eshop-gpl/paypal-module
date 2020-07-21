<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A request to settle a dispute in either the customer's or merchant's favor.
 */
class Adjudicate implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $adjudication_outcome;
}
