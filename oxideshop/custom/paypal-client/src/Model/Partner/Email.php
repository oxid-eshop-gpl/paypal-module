<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * An email address at which the person or business can be contacted.
 */
class Email implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $type;

    /** @var string */
    public $email;
}
