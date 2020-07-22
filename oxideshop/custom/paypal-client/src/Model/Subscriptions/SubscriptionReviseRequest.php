<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The request to update the quantity of the product or service in a subscription. You can also use this method
 * to switch the plan and update the `shipping_amount` and `shipping_address` values for the subscription. This
 * type of update requires the buyer's consent.
 *
 * generated from: subscription_revise_request.json
 */
class SubscriptionReviseRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The unique PayPal-generated ID for the plan.
     *
     * minLength: 3
     * maxLength: 50
     */
    public $plan_id;

    /**
     * @var string
     * The quantity of the product or service in the subscription.
     *
     * minLength: 1
     * maxLength: 32
     */
    public $quantity;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $effective_time;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $shipping_amount;

    /**
     * @var ShippingDetail
     * The shipping details.
     */
    public $shipping_address;

    /**
     * @var CustomizedXUnsupportedNineEightNineFourApplicationContext
     * The application context, which customizes the payer experience during the subscription approval process with
     * PayPal.
     */
    public $application_context;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->plan_id) || Assert::minLength($this->plan_id, 3, "plan_id in SubscriptionReviseRequest must have minlength of 3 $within");
        !isset($this->plan_id) || Assert::maxLength($this->plan_id, 50, "plan_id in SubscriptionReviseRequest must have maxlength of 50 $within");
        !isset($this->quantity) || Assert::minLength($this->quantity, 1, "quantity in SubscriptionReviseRequest must have minlength of 1 $within");
        !isset($this->quantity) || Assert::maxLength($this->quantity, 32, "quantity in SubscriptionReviseRequest must have maxlength of 32 $within");
        !isset($this->effective_time) || Assert::minLength($this->effective_time, 20, "effective_time in SubscriptionReviseRequest must have minlength of 20 $within");
        !isset($this->effective_time) || Assert::maxLength($this->effective_time, 64, "effective_time in SubscriptionReviseRequest must have maxlength of 64 $within");
        !isset($this->shipping_amount) || Assert::isInstanceOf($this->shipping_amount, Money::class, "shipping_amount in SubscriptionReviseRequest must be instance of Money $within");
        !isset($this->shipping_amount) || $this->shipping_amount->validate(SubscriptionReviseRequest::class);
        !isset($this->shipping_address) || Assert::isInstanceOf($this->shipping_address, ShippingDetail::class, "shipping_address in SubscriptionReviseRequest must be instance of ShippingDetail $within");
        !isset($this->shipping_address) || $this->shipping_address->validate(SubscriptionReviseRequest::class);
        !isset($this->application_context) || Assert::isInstanceOf($this->application_context, CustomizedXUnsupportedNineEightNineFourApplicationContext::class, "application_context in SubscriptionReviseRequest must be instance of CustomizedXUnsupportedNineEightNineFourApplicationContext $within");
        !isset($this->application_context) || $this->application_context->validate(SubscriptionReviseRequest::class);
    }

    public function __construct()
    {
    }
}
