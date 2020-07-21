<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Details of the person or party.
 */
class Person implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var string */
    public $party_id;

    /** @var array<PersonName> */
    public $names;

    /** @var string */
    public $citizenship;

    /** @var array<PersonAddressDetail> */
    public $addresses;

    /** @var array<PersonPhoneDetail> */
    public $phones;

    /** @var BirthDetails */
    public $birth_details;

    /** @var array<PersonDocument> */
    public $documents;
}
