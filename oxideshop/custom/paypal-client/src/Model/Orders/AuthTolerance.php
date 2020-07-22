<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Auth-Capture Tolerance details.
 *
 * generated from: model-auth_tolerance.json
 */
class AuthTolerance implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The percentage, as a fixed-point, signed decimal number. For example, define a 19.99% interest rate as
     * `19.99`.
     */
    public $percent;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $absolute;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->absolute) || Assert::notNull($this->absolute->currency_code, "currency_code in absolute must not be NULL within AuthTolerance $within");
        !isset($this->absolute) || Assert::notNull($this->absolute->value, "value in absolute must not be NULL within AuthTolerance $within");
        !isset($this->absolute) || Assert::isInstanceOf($this->absolute, Money::class, "absolute in AuthTolerance must be instance of Money $within");
        !isset($this->absolute) || $this->absolute->validate(AuthTolerance::class);
    }

    public function __construct()
    {
    }
}
