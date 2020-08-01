<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use OxidProfessionalServices\PayPal\Api\Model\CommonV3\Money;
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
     * The group name for a dimension.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $key;

    /**
     * The count of items in a group.
     *
     * @var int | null
     */
    public $count;

    /**
     * An array of the sums of amounts for each currency.
     *
     * @var Money[] | null
     */
    public $amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->key) || Assert::minLength(
            $this->key,
            1,
            "key in Metric must have minlength of 1 $within"
        );
        !isset($this->key) || Assert::maxLength(
            $this->key,
            255,
            "key in Metric must have maxlength of 255 $within"
        );
        !isset($this->amount) || Assert::isArray(
            $this->amount,
            "amount in Metric must be array $within"
        );
        if (isset($this->amount)) {
            foreach ($this->amount as $item) {
                $item->validate(Metric::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['key'])) {
            $this->key = $data['key'];
        }
        if (isset($data['count'])) {
            $this->count = $data['count'];
        }
        if (isset($data['amount'])) {
            $this->amount = [];
            foreach ($data['amount'] as $item) {
                $this->amount[] = new Money($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
