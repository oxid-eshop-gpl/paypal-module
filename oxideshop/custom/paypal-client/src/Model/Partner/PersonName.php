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

    const TYPE_LEGAL = 'LEGAL';

    /**
     * @var string
     * The person's name type.
     */
    public $type;
}
