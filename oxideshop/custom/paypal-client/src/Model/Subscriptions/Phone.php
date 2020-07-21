<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The phone number, in its canonical international [E.164 numbering plan format](https://www.itu.int/rec/T-REC-E.164/en).
 */
class Phone implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $country_code;

    /** @var string */
    public $national_number;

    /** @var string */
    public $extension_number;
}
