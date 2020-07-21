<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The time, in the hh:mm 24 Hr format.
 */
class TimeHourmin implements JsonSerializable
{
    use BaseModel;
}
