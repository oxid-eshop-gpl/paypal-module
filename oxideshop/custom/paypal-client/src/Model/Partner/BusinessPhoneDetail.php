<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The phone number, in its canonical international [E.164 numbering plan
 * format](https://www.itu.int/rec/T-REC-E.164/en).
 */
class BusinessPhoneDetail extends Phone implements JsonSerializable
{
    use BaseModel;

    const TYPE_CUSTOMER_SERVICE = 'CUSTOMER_SERVICE';

    /** @var string */
    public $contact_name;

    /** @var boolean */
    public $inactive;

    /** @var boolean */
    public $primary;

    /**
     * @var string
     * The type of phone number provided. For example, home, work, or mobile.
     */
    public $type;

    /** @var array<string> */
    public $tags;
}
