<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->key) || Assert::minLength($this->key, 1, "key in Metric must have minlength of 1 $within");
        !isset($this->key) || Assert::maxLength($this->key, 255, "key in Metric must have maxlength of 255 $within");
        !isset($this->amount) || Assert::isArray($this->amount, "amount in Metric must be array $within");

                                if (isset($this->amount)){
                                    foreach ($this->amount as $item) {
                                        $item->validate(Metric::class);
                                    }
                                }
    }

    public function __construct()
    {
    }
}
