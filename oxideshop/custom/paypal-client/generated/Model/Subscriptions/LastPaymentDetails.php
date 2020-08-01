<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use OxidProfessionalServices\PayPal\Api\Model\CommonV3\Money;
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
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money
     */
    public $amount;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string
     * minLength: 20
     * maxLength: 64
     */
    public $time;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->amount, "amount in LastPaymentDetails must not be NULL $within");
        Assert::isInstanceOf(
            $this->amount,
            Money::class,
            "amount in LastPaymentDetails must be instance of Money $within"
        );
         $this->amount->validate(LastPaymentDetails::class);
        Assert::notNull($this->time, "time in LastPaymentDetails must not be NULL $within");
        Assert::minLength(
            $this->time,
            20,
            "time in LastPaymentDetails must have minlength of 20 $within"
        );
        Assert::maxLength(
            $this->time,
            64,
            "time in LastPaymentDetails must have maxlength of 64 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['amount'])) {
            $this->amount = new Money($data['amount']);
        }
        if (isset($data['time'])) {
            $this->time = $data['time'];
        }
    }

    public function __construct(array $data = null)
    {
        $this->amount = new Money();
        if (isset($data)) {
            $this->map($data);
        }
    }
}
