<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Auth-Capture Tolerance details.
 */
class AuthTolerance implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $percent;

    /** @var Money */
    public $absolute;
}
