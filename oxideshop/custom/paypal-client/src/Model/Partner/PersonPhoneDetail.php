<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The phone number, in its canonical international [E.164 numbering plan
 * format](https://www.itu.int/rec/T-REC-E.164/en).
 */
class PersonPhoneDetail extends Phone implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $contact_name;

    /** @var boolean */
    public $inactive;

    /** @var boolean */
    public $primary;

    /** @var boolean */
    public $primary_mobile;

    /** @var string */
    public $type;

    /** @var array<string> */
    public $tags;
}
