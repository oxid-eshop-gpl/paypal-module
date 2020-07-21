<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Information used to pay using POLi.
 */
class Poli implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $name;

    /** @var string */
    public $country_code;
}
