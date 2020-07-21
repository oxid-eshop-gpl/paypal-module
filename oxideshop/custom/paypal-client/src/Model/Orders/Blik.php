<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Information used to pay using BLIK
 */
class Blik implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $name;

    /** @var string */
    public $country_code;

    /** @var string */
    public $email;
}
