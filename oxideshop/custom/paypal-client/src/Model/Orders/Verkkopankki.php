<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Information used to pay using Verkkopankki (Finnish Online Banking).
 */
class Verkkopankki implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $name;

    /** @var string */
    public $email;

    /** @var string */
    public $country_code;

    /** @var string */
    public $bank_name;
}
