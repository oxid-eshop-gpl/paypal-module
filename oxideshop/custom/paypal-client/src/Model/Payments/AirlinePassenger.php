<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The airline passenger details.
 */
class AirlinePassenger implements \JsonSerializable
{
    use BaseModel;

    /** @var Name */
    public $name;

    /** @var string */
    public $date_of_birth;

    /** @var string */
    public $country_code;

    /** @var string */
    public $customer_code;
}
