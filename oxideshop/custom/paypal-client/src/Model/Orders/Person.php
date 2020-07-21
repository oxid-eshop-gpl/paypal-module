<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Person information.
 */
class Person extends Party implements JsonSerializable
{
    use BaseModel;

    /** @var array<Name> */
    public $names;

    /** @var string */
    public $citizenship;

    /** @var string */
    public $birth_date;

    /** @var array<IdentityDocument> */
    public $identifications;
}
