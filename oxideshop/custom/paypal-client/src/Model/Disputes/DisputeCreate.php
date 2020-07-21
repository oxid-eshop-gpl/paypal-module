<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The create dispute response.
 */
class DisputeCreate implements JsonSerializable
{
    use BaseModel;

    /** @var array<array> */
    public $links;
}
