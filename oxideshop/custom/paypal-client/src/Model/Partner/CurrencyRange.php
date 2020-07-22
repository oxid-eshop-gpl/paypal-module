<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The currency range, from the minimum inclusive amount to the maximum inclusive amount.
 *
 * generated from: onboarding_common-currency_range.json
 */
class CurrencyRange implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $minimum_amount;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $maximum_amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->minimum_amount) || Assert::notNull($this->minimum_amount->currency_code, "currency_code in minimum_amount must not be NULL within CurrencyRange $within");
        !isset($this->minimum_amount) || Assert::notNull($this->minimum_amount->value, "value in minimum_amount must not be NULL within CurrencyRange $within");
        !isset($this->minimum_amount) || Assert::isInstanceOf($this->minimum_amount, Money::class, "minimum_amount in CurrencyRange must be instance of Money $within");
        !isset($this->minimum_amount) || $this->minimum_amount->validate(CurrencyRange::class);
        !isset($this->maximum_amount) || Assert::notNull($this->maximum_amount->currency_code, "currency_code in maximum_amount must not be NULL within CurrencyRange $within");
        !isset($this->maximum_amount) || Assert::notNull($this->maximum_amount->value, "value in maximum_amount must not be NULL within CurrencyRange $within");
        !isset($this->maximum_amount) || Assert::isInstanceOf($this->maximum_amount, Money::class, "maximum_amount in CurrencyRange must be instance of Money $within");
        !isset($this->maximum_amount) || $this->maximum_amount->validate(CurrencyRange::class);
    }

    public function __construct()
    {
    }
}
