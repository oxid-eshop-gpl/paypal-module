<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Information used to pay using P24(Przelewy24)
 */
class PTwoFour implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $name;

    /** @var string */
    public $email;

    /** @var string */
    public $country_code;

    /** @var string */
    public $payment_descriptor;

    /** @var string */
    public $method_id;

    /** @var string */
    public $method_description;
}
