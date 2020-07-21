<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A metric.
 */
class Metric implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $key;

    /** @var integer */
    public $count;

    /** @var array<Money> */
    public $amount;
}
