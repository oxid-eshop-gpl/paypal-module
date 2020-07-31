<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The tax details.
 *
 * generated from: taxes.json
 */
class Taxes implements JsonSerializable
{
    use BaseModel;

    /**
     * The percentage, as a fixed-point, signed decimal number. For example, define a 19.99% interest rate as
     * `19.99`.
     *
     * @var string
     */
    public $percentage;

    /**
     * Indicates whether the tax was already included in the billing amount.
     *
     * @var boolean | null
     */
    public $inclusive = true;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->percentage, "percentage in Taxes must not be NULL $within");
    }

    private function map(array $data)
    {
        if (isset($data['percentage'])) {
            $this->percentage = $data['percentage'];
        }
        if (isset($data['inclusive'])) {
            $this->inclusive = $data['inclusive'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) { $this->map($data); }
    }
}
