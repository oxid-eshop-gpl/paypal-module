<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use OxidProfessionalServices\PayPal\Api\Model\CommonV3\LinkDescription;
use OxidProfessionalServices\PayPal\Api\Model\CommonV3\Money;
use OxidProfessionalServices\PayPal\Api\Model\MerchantV1\FundingInstrumentResponse;
use OxidProfessionalServices\PayPal\Api\Model\MerchantV1\Payee;
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
    public const PREFERRED_CURRENCY_CONVERSION_PAYPAL = 'PAYPAL';

    /** Vendor currency conversion. */
    public const PREFERRED_CURRENCY_CONVERSION_VENDOR = 'VENDOR';

    /**
     * The PayPal-generated ID for the subscription.
     *
     * @var string | null
     * minLength: 3
     * maxLength: 50
     */
    public $id;

    /**
     * The ID of the plan.
     *
     * @var string | null
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
     * The merchant who receives the funds and fulfills the order. The merchant is also known as the payee.
     *
     * @var Payee | null
     */
    public $payee;

    /**
     * The subscriber response information.
     *
     * @var Subscriber | null
     */
    public $subscriber;

    /**
     * The billing details for the subscription. If the subscription was or is active, these fields are populated.
     *
     * @var SubscriptionBillingInfo | null
     */
    public $billing_info;

    /**
     * DEPRECATED. Indicates whether the subscription auto-renews after the billing cycles complete.
     *
     * @var boolean | null
     */
    public $auto_renewal = false;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $update_time;

    /**
     * The list of currency conversion providers.
     *
     * use one of constants defined in this class to set the value:
     * @see PREFERRED_CURRENCY_CONVERSION_PAYPAL
     * @see PREFERRED_CURRENCY_CONVERSION_VENDOR
     * @var string | null
     */
    public $preferred_currency_conversion;

    /**
     * The customer's funding instrument. Returned as a funding option to external entities.
     *
     * @var FundingInstrumentResponse | null
     */
    public $preferred_funding_source;

    /**
     * An array of request-related [HATEOAS links](/docs/api/reference/api-responses/#hateoas-links).
     *
     * @var LinkDescription[] | null
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength(
            $this->id,
            3,
            "id in Subscription must have minlength of 3 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            50,
            "id in Subscription must have maxlength of 50 $within"
        );
        !isset($this->plan_id) || Assert::minLength(
            $this->plan_id,
            3,
            "plan_id in Subscription must have minlength of 3 $within"
        );
        !isset($this->plan_id) || Assert::maxLength(
            $this->plan_id,
            50,
            "plan_id in Subscription must have maxlength of 50 $within"
        );
        !isset($this->start_time) || Assert::minLength(
            $this->start_time,
            20,
            "start_time in Subscription must have minlength of 20 $within"
        );
        !isset($this->start_time) || Assert::maxLength(
            $this->start_time,
            64,
            "start_time in Subscription must have maxlength of 64 $within"
        );
        !isset($this->quantity) || Assert::minLength(
            $this->quantity,
            1,
            "quantity in Subscription must have minlength of 1 $within"
        );
        !isset($this->quantity) || Assert::maxLength(
            $this->quantity,
            32,
            "quantity in Subscription must have maxlength of 32 $within"
        );
        !isset($this->shipping_amount) || Assert::isInstanceOf(
            $this->shipping_amount,
            Money::class,
            "shipping_amount in Subscription must be instance of Money $within"
        );
        !isset($this->shipping_amount) ||  $this->shipping_amount->validate(Subscription::class);
        !isset($this->payee) || Assert::isInstanceOf(
            $this->payee,
            Payee::class,
            "payee in Subscription must be instance of Payee $within"
        );
        !isset($this->payee) ||  $this->payee->validate(Subscription::class);
        !isset($this->subscriber) || Assert::isInstanceOf(
            $this->subscriber,
            Subscriber::class,
            "subscriber in Subscription must be instance of Subscriber $within"
        );
        !isset($this->subscriber) ||  $this->subscriber->validate(Subscription::class);
        !isset($this->billing_info) || Assert::isInstanceOf(
            $this->billing_info,
            SubscriptionBillingInfo::class,
            "billing_info in Subscription must be instance of SubscriptionBillingInfo $within"
        );
        !isset($this->billing_info) ||  $this->billing_info->validate(Subscription::class);
        !isset($this->create_time) || Assert::minLength(
            $this->create_time,
            20,
            "create_time in Subscription must have minlength of 20 $within"
        );
        !isset($this->create_time) || Assert::maxLength(
            $this->create_time,
            64,
            "create_time in Subscription must have maxlength of 64 $within"
        );
        !isset($this->update_time) || Assert::minLength(
            $this->update_time,
            20,
            "update_time in Subscription must have minlength of 20 $within"
        );
        !isset($this->update_time) || Assert::maxLength(
            $this->update_time,
            64,
            "update_time in Subscription must have maxlength of 64 $within"
        );
        !isset($this->preferred_funding_source) || Assert::isInstanceOf(
            $this->preferred_funding_source,
            FundingInstrumentResponse::class,
            "preferred_funding_source in Subscription must be instance of FundingInstrumentResponse $within"
        );
        !isset($this->preferred_funding_source) ||  $this->preferred_funding_source->validate(Subscription::class);
        !isset($this->links) || Assert::isArray(
            $this->links,
            "links in Subscription must be array $within"
        );
        if (isset($this->links)) {
            foreach ($this->links as $item) {
                $item->validate(Subscription::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
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
        if (isset($data['payee'])) {
            $this->payee = new Payee($data['payee']);
        }
        if (isset($data['subscriber'])) {
            $this->subscriber = new Subscriber($data['subscriber']);
        }
        if (isset($data['billing_info'])) {
            $this->billing_info = new SubscriptionBillingInfo($data['billing_info']);
        }
        if (isset($data['auto_renewal'])) {
            $this->auto_renewal = $data['auto_renewal'];
        }
        if (isset($data['create_time'])) {
            $this->create_time = $data['create_time'];
        }
        if (isset($data['update_time'])) {
            $this->update_time = $data['update_time'];
        }
        if (isset($data['preferred_currency_conversion'])) {
            $this->preferred_currency_conversion = $data['preferred_currency_conversion'];
        }
        if (isset($data['preferred_funding_source'])) {
            $this->preferred_funding_source = new FundingInstrumentResponse($data['preferred_funding_source']);
        }
        if (isset($data['links'])) {
            $this->links = [];
            foreach ($data['links'] as $item) {
                $this->links[] = new LinkDescription($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        if (isset($data)) {
            $this->map($data);
        }
    }
}
