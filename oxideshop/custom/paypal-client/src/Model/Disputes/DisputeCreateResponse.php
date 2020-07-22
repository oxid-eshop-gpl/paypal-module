<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The create dispute response.
 *
 * generated from: referred-dispute_create_response.json
 */
class DisputeCreateResponse implements JsonSerializable
{
    use BaseModel;

    /** @var array<array> */
    public $links;
}
