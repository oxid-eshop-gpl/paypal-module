<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The name of the person.
 */
class PersonName extends Name implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The person's name type.
     */
    public $type;
}
