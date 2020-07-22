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
     * @var string
     * The percentage, as a fixed-point, signed decimal number. For example, define a 19.99% interest rate as
     * `19.99`.
     *
     * this is mandatory to be set
     */
    public $percentage;

    /**
     * @var boolean
     * Indicates whether the tax was already included in the billing amount.
     */
    public $inclusive = true;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->percentage, "percentage in Taxes must not be NULL $within");
    }

    public function __construct()
    {
    }
}
