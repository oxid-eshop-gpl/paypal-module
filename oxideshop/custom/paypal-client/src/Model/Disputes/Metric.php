<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A metric.
 *
 * generated from: response-metric.json
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
