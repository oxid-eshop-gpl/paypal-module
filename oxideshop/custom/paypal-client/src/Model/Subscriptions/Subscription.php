<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The subscription details.
 *
 * generated from: subscription.json
 */
class Subscription extends SubscriptionStatus implements JsonSerializable
{
    use BaseModel;

    /** PayPal currency conversion. */
    const PREFERRED_CURRENCY_CONVERSION_PAYPAL = 'PAYPAL';

    /** Vendor currency conversion. */
    const PREFERRED_CURRENCY_CONVERSION_VENDOR = 'VENDOR';

    /**
     * @var string
     * The PayPal-generated ID for the subscription.
     *
     * minLength: 3
     * maxLength: 50
     */
    public $id;

    /**
     * @var string
     * The ID of the plan.
     *
     * minLength: 3
     * maxLength: 50
     */
    public $plan_id;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $start_time;

    /**
     * @var string
     * The quantity of the product in the subscription.
     *
     * minLength: 1
     * maxLength: 32
     */
    public $quantity;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $shipping_amount;

    /**
     * @var Payee
     * The merchant who receives the funds and fulfills the order. The merchant is also known as the payee.
     */
    public $payee;

    /**
     * @var Subscriber
     * The subscriber response information.
     */
    public $subscriber;

    /**
     * @var SubscriptionBillingInfo
     * The billing details for the subscription. If the subscription was or is active, these fields are populated.
     */
    public $billing_info;

    /**
     * @var boolean
     * DEPRECATED. Indicates whether the subscription auto-renews after the billing cycles complete.
     */
    public $auto_renewal = false;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $update_time;

    /**
     * @var string
     * The list of currency conversion providers.
     *
     * use one of constants defined in this class to set the value:
     * @see PREFERRED_CURRENCY_CONVERSION_PAYPAL
     * @see PREFERRED_CURRENCY_CONVERSION_VENDOR
     */
    public $preferred_currency_conversion;

    /**
     * @var FundingInstrumentResponse
     * The customer's funding instrument. Returned as a funding option to external entities.
     */
    public $preferred_funding_source;

    /**
     * @var array<array>
     * An array of request-related [HATEOAS links](/docs/api/reference/api-responses/#hateoas-links).
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength($this->id, 3, "id in Subscription must have minlength of 3 $within");
        !isset($this->id) || Assert::maxLength($this->id, 50, "id in Subscription must have maxlength of 50 $within");
        !isset($this->plan_id) || Assert::minLength($this->plan_id, 3, "plan_id in Subscription must have minlength of 3 $within");
        !isset($this->plan_id) || Assert::maxLength($this->plan_id, 50, "plan_id in Subscription must have maxlength of 50 $within");
        !isset($this->start_time) || Assert::minLength($this->start_time, 20, "start_time in Subscription must have minlength of 20 $within");
        !isset($this->start_time) || Assert::maxLength($this->start_time, 64, "start_time in Subscription must have maxlength of 64 $within");
        !isset($this->quantity) || Assert::minLength($this->quantity, 1, "quantity in Subscription must have minlength of 1 $within");
        !isset($this->quantity) || Assert::maxLength($this->quantity, 32, "quantity in Subscription must have maxlength of 32 $within");
        !isset($this->shipping_amount) || Assert::notNull($this->shipping_amount->currency_code, "currency_code in shipping_amount must not be NULL within Subscription $within");
        !isset($this->shipping_amount) || Assert::notNull($this->shipping_amount->value, "value in shipping_amount must not be NULL within Subscription $within");
        !isset($this->shipping_amount) || Assert::isInstanceOf($this->shipping_amount, Money::class, "shipping_amount in Subscription must be instance of Money $within");
        !isset($this->shipping_amount) || $this->shipping_amount->validate(Subscription::class);
        !isset($this->payee) || Assert::isInstanceOf($this->payee, Payee::class, "payee in Subscription must be instance of Payee $within");
        !isset($this->payee) || $this->payee->validate(Subscription::class);
        !isset($this->subscriber) || Assert::isInstanceOf($this->subscriber, Subscriber::class, "subscriber in Subscription must be instance of Subscriber $within");
        !isset($this->subscriber) || $this->subscriber->validate(Subscription::class);
        !isset($this->billing_info) || Assert::notNull($this->billing_info->outstanding_balance, "outstanding_balance in billing_info must not be NULL within Subscription $within");
        !isset($this->billing_info) || Assert::notNull($this->billing_info->failed_payments_count, "failed_payments_count in billing_info must not be NULL within Subscription $within");
        !isset($this->billing_info) || Assert::isInstanceOf($this->billing_info, SubscriptionBillingInfo::class, "billing_info in Subscription must be instance of SubscriptionBillingInfo $within");
        !isset($this->billing_info) || $this->billing_info->validate(Subscription::class);
        !isset($this->create_time) || Assert::minLength($this->create_time, 20, "create_time in Subscription must have minlength of 20 $within");
        !isset($this->create_time) || Assert::maxLength($this->create_time, 64, "create_time in Subscription must have maxlength of 64 $within");
        !isset($this->update_time) || Assert::minLength($this->update_time, 20, "update_time in Subscription must have minlength of 20 $within");
        !isset($this->update_time) || Assert::maxLength($this->update_time, 64, "update_time in Subscription must have maxlength of 64 $within");
        !isset($this->preferred_funding_source) || Assert::isInstanceOf($this->preferred_funding_source, FundingInstrumentResponse::class, "preferred_funding_source in Subscription must be instance of FundingInstrumentResponse $within");
        !isset($this->preferred_funding_source) || $this->preferred_funding_source->validate(Subscription::class);
        !isset($this->links) || Assert::isArray($this->links, "links in Subscription must be array $within");
    }

    public function __construct()
    {
    }
}
