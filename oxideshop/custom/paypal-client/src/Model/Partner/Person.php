<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Details of the person or party.
 */
class Person implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var string */
    public $party_id;

    /** @var array */
    public $names;

    /** @var string */
    public $citizenship;

    /** @var array */
    public $addresses;

    /** @var array */
    public $phones;

    /** @var BirthDetails */
    public $birth_details;

    /** @var array */
    public $documents;
}
