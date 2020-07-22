<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details for the last payment of the subscription.
 *
 * generated from: last_payment_details.json
 */
class LastPaymentDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $time;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->amount) || Assert::notNull($this->amount->currency_code, "currency_code in amount must not be NULL within LastPaymentDetails $within");
        !isset($this->amount) || Assert::notNull($this->amount->value, "value in amount must not be NULL within LastPaymentDetails $within");
        !isset($this->amount) || Assert::isInstanceOf($this->amount, Money::class, "amount in LastPaymentDetails must be instance of Money $within");
        !isset($this->amount) || $this->amount->validate(LastPaymentDetails::class);
        !isset($this->time) || Assert::minLength($this->time, 20, "time in LastPaymentDetails must have minlength of 20 $within");
        !isset($this->time) || Assert::maxLength($this->time, 64, "time in LastPaymentDetails must have maxlength of 64 $within");
    }

    public function __construct()
    {
    }
}
