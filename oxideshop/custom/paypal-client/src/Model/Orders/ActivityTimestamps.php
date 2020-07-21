<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The date and time stamps that are common to authorized payment, captured payment, and refund transactions.
 */
class ActivityTimestamps implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $create_time;

    /** @var string */
    public $update_time;
}
