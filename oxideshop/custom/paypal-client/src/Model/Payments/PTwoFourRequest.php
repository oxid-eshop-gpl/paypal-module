<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Information needed to pay using P24 (Przelewy24).
 */
class PTwoFourRequest implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $name;

    /** @var string */
    public $email;

    /** @var string */
    public $country_code;
}
