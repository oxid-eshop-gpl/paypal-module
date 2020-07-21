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

    /** Indicates that this name is the legal name of the user. */
    const TYPE_LEGAL = 'LEGAL';

    /**
     * @var string
     * The person's name type.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_LEGAL
     */
    public $type;
}
