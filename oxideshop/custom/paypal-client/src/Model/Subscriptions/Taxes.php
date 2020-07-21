<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The tax details.
 */
class Taxes implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $percentage;

    /** @var boolean */
    public $inclusive;
}
