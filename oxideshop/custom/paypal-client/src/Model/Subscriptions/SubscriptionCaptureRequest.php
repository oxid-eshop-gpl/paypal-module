<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The charge amount from the subscriber.
 *
 * generated from: subscription_capture_request.json
 */
class SubscriptionCaptureRequest implements JsonSerializable
{
    use BaseModel;

    /** The outstanding balance that the subscriber must clear. */
    const CAPTURE_TYPE_OUTSTANDING_BALANCE = 'OUTSTANDING_BALANCE';

    /**
     * @var string
     * The reason or note for the subscription charge.
     *
     * minLength: 1
     * maxLength: 128
     */
    public $note;

    /**
     * @var string
     * The type of capture.
     *
     * use one of constants defined in this class to set the value:
     * @see CAPTURE_TYPE_OUTSTANDING_BALANCE
     * minLength: 1
     * maxLength: 24
     */
    public $capture_type;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->note) || Assert::minLength($this->note, 1, "note in SubscriptionCaptureRequest must have minlength of 1 $within");
        !isset($this->note) || Assert::maxLength($this->note, 128, "note in SubscriptionCaptureRequest must have maxlength of 128 $within");
        !isset($this->capture_type) || Assert::minLength($this->capture_type, 1, "capture_type in SubscriptionCaptureRequest must have minlength of 1 $within");
        !isset($this->capture_type) || Assert::maxLength($this->capture_type, 24, "capture_type in SubscriptionCaptureRequest must have maxlength of 24 $within");
        !isset($this->amount) || Assert::notNull($this->amount->currency_code, "currency_code in amount must not be NULL within SubscriptionCaptureRequest $within");
        !isset($this->amount) || Assert::notNull($this->amount->value, "value in amount must not be NULL within SubscriptionCaptureRequest $within");
        !isset($this->amount) || Assert::isInstanceOf($this->amount, Money::class, "amount in SubscriptionCaptureRequest must be instance of Money $within");
        !isset($this->amount) || $this->amount->validate(SubscriptionCaptureRequest::class);
    }

    public function __construct()
    {
    }
}
