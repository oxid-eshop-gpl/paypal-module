<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Information needed to pay using Trustly.
 */
class TrustlyRequest implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $name;

    /** @var string */
    public $country_code;
}
