<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The business name of the party.
 */
class BusinessName implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $business_name;

    /** @var string */
    public $orthography;
}
