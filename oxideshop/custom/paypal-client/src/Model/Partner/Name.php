<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The name of the party.
 */
class Name implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $prefix;

    /** @var string */
    public $given_name;

    /** @var string */
    public $surname;

    /** @var string */
    public $middle_name;

    /** @var string */
    public $suffix;

    /** @var string */
    public $full_name;
}
