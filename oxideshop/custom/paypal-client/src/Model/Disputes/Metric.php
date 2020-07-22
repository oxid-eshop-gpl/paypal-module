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

    /**
     * @var string
     * The group name for a dimension.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $key;

    /**
     * @var integer
     * The count of items in a group.
     */
    public $count;

    /**
     * @var array<Money>
     * An array of the sums of amounts for each currency.
     */
    public $amount;
}
