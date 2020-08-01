<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use OxidProfessionalServices\PayPal\Api\Model\CommonV3\Money;
use Webmozart\Assert\Assert;

/**
 * The create subscription request details.
 *
 * generated from: subscription_request_post.json
 */
class SubscriptionRequestPost implements JsonSerializable
{
    use BaseModel;

    /**
     * The ID of the plan.
     *
     * @var string
     * minLength: 3
     * maxLength: 50
     */
    public $plan_id;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $start_time;

    /**
     * The quantity of the product in the subscription.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 32
     */
    public $quantity;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $shipping_amount;

    /**
     * The subscriber request information .
     *
     * @var SubscriberRequest | null
     */
    public $subscriber;

    /**
     * DEPRECATED. Indicates whether the subscription auto-renews after the billing cycles complete.
     *
     * @var boolean | null
     */
    public $auto_renewal = false;

    /**
     * The application context, which customizes the payer experience during the subscription approval process with
     * PayPal.
     *
     * @var ApplicationContext | null
     */
    public $application_context;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->plan_id, "plan_id in SubscriptionRequestPost must not be NULL $within");
        Assert::minLength(
            $this->plan_id,
            3,
            "plan_id in SubscriptionRequestPost must have minlength of 3 $within"
        );
        Assert::maxLength(
            $this->plan_id,
            50,
            "plan_id in SubscriptionRequestPost must have maxlength of 50 $within"
        );
        !isset($this->start_time) || Assert::minLength(
            $this->start_time,
            20,
            "start_time in SubscriptionRequestPost must have minlength of 20 $within"
        );
        !isset($this->start_time) || Assert::maxLength(
            $this->start_time,
            64,
            "start_time in SubscriptionRequestPost must have maxlength of 64 $within"
        );
        !isset($this->quantity) || Assert::minLength(
            $this->quantity,
            1,
            "quantity in SubscriptionRequestPost must have minlength of 1 $within"
        );
        !isset($this->quantity) || Assert::maxLength(
            $this->quantity,
            32,
            "quantity in SubscriptionRequestPost must have maxlength of 32 $within"
        );
        !isset($this->shipping_amount) || Assert::isInstanceOf(
            $this->shipping_amount,
            Money::class,
            "shipping_amount in SubscriptionRequestPost must be instance of Money $within"
        );
        !isset($this->shipping_amount) ||  $this->shipping_amount->validate(SubscriptionRequestPost::class);
        !isset($this->subscriber) || Assert::isInstanceOf(
            $this->subscriber,
            SubscriberRequest::class,
            "subscriber in SubscriptionRequestPost must be instance of SubscriberRequest $within"
        );
        !isset($this->subscriber) ||  $this->subscriber->validate(SubscriptionRequestPost::class);
        !isset($this->application_context) || Assert::isInstanceOf(
            $this->application_context,
            ApplicationContext::class,
            "application_context in SubscriptionRequestPost must be instance of ApplicationContext $within"
        );
        !isset($this->application_context) ||  $this->application_context->validate(SubscriptionRequestPost::class);
    }

    private function map(array $data)
    {
        if (isset($data['plan_id'])) {
            $this->plan_id = $data['plan_id'];
        }
        if (isset($data['start_time'])) {
            $this->start_time = $data['start_time'];
        }
        if (isset($data['quantity'])) {
            $this->quantity = $data['quantity'];
        }
        if (isset($data['shipping_amount'])) {
            $this->shipping_amount = new Money($data['shipping_amount']);
        }
        if (isset($data['subscriber'])) {
            $this->subscriber = new SubscriberRequest($data['subscriber']);
        }
        if (isset($data['auto_renewal'])) {
            $this->auto_renewal = $data['auto_renewal'];
        }
        if (isset($data['application_context'])) {
            $this->application_context = new ApplicationContext($data['application_context']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
