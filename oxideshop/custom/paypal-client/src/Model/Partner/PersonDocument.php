<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The documents associated with the person.
 */
class PersonDocument extends Document implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The type of documents.
     */
    public $type;
}
