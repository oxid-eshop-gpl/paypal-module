<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The subsequent action.
 */
class SubsequentAction implements JsonSerializable
{
    use BaseModel;

    /** @var array<array> */
    public $links;
}
