<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The billing details for the subscription. If the subscription was or is active, these fields are populated.
 *
 * generated from: subscription_billing_info.json
 */
class SubscriptionBillingInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * this is mandatory to be set
     */
    public $outstanding_balance;

    /**
     * @var array<CycleExecution>
     * The trial and regular billing executions.
     *
     * this is mandatory to be set
     * maxItems: 0
     * maxItems: 2
     */
    public $cycle_executions;

    /**
     * @var LastPaymentDetails
     * The details for the last payment of the subscription.
     */
    public $last_payment;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $next_billing_time;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $next_payment;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $final_payment_time;

    /**
     * @var integer
     * The number of consecutive payment failures. Resets to `0` after a successful payment. If this reaches the
     * `payment_failure_threshold` value, the subscription updates to the `SUSPENDED` state.
     *
     * this is mandatory to be set
     */
    public $failed_payments_count;

    /**
     * @var FailedPaymentDetails
     * The details for the failed payment of the subscription.
     */
    public $last_failed_payment;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $total_paid_amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->outstanding_balance, "outstanding_balance in SubscriptionBillingInfo must not be NULL $within");
         Assert::isInstanceOf($this->outstanding_balance, Money::class, "outstanding_balance in SubscriptionBillingInfo must be instance of Money $within");
         $this->outstanding_balance->validate(SubscriptionBillingInfo::class);
        Assert::notNull($this->cycle_executions, "cycle_executions in SubscriptionBillingInfo must not be NULL $within");
         Assert::minCount($this->cycle_executions, 0, "cycle_executions in SubscriptionBillingInfo must have min. count of 0 $within");
         Assert::maxCount($this->cycle_executions, 2, "cycle_executions in SubscriptionBillingInfo must have max. count of 2 $within");
         Assert::isArray($this->cycle_executions, "cycle_executions in SubscriptionBillingInfo must be array $within");

                                if (isset($this->cycle_executions)){
                                    foreach ($this->cycle_executions as $item) {
                                        $item->validate(SubscriptionBillingInfo::class);
                                    }
                                }

        !isset($this->last_payment) || Assert::isInstanceOf($this->last_payment, LastPaymentDetails::class, "last_payment in SubscriptionBillingInfo must be instance of LastPaymentDetails $within");
        !isset($this->last_payment) || $this->last_payment->validate(SubscriptionBillingInfo::class);
        !isset($this->next_billing_time) || Assert::minLength($this->next_billing_time, 20, "next_billing_time in SubscriptionBillingInfo must have minlength of 20 $within");
        !isset($this->next_billing_time) || Assert::maxLength($this->next_billing_time, 64, "next_billing_time in SubscriptionBillingInfo must have maxlength of 64 $within");
        !isset($this->next_payment) || Assert::isInstanceOf($this->next_payment, Money::class, "next_payment in SubscriptionBillingInfo must be instance of Money $within");
        !isset($this->next_payment) || $this->next_payment->validate(SubscriptionBillingInfo::class);
        !isset($this->final_payment_time) || Assert::minLength($this->final_payment_time, 20, "final_payment_time in SubscriptionBillingInfo must have minlength of 20 $within");
        !isset($this->final_payment_time) || Assert::maxLength($this->final_payment_time, 64, "final_payment_time in SubscriptionBillingInfo must have maxlength of 64 $within");
        Assert::notNull($this->failed_payments_count, "failed_payments_count in SubscriptionBillingInfo must not be NULL $within");
        !isset($this->last_failed_payment) || Assert::isInstanceOf($this->last_failed_payment, FailedPaymentDetails::class, "last_failed_payment in SubscriptionBillingInfo must be instance of FailedPaymentDetails $within");
        !isset($this->last_failed_payment) || $this->last_failed_payment->validate(SubscriptionBillingInfo::class);
        !isset($this->total_paid_amount) || Assert::isInstanceOf($this->total_paid_amount, Money::class, "total_paid_amount in SubscriptionBillingInfo must be instance of Money $within");
        !isset($this->total_paid_amount) || $this->total_paid_amount->validate(SubscriptionBillingInfo::class);
    }

    public function __construct()
    {
    }
}
