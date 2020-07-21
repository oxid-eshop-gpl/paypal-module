<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The provide supporting information request details.
 */
class ProvideSupportingInfo implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $notes;
}
