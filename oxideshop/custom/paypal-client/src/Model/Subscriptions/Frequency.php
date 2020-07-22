<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The frequency of the billing cycle.
 *
 * generated from: frequency.json
 */
class Frequency implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $interval_unit;

    /** @var integer */
    public $interval_count;
}
