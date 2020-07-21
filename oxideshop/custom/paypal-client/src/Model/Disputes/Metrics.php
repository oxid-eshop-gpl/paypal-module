<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The computed metrics for disputes.
 */
class Metrics implements JsonSerializable
{
    use BaseModel;

    /** @var array<Metric> */
    public $metrics;
}
