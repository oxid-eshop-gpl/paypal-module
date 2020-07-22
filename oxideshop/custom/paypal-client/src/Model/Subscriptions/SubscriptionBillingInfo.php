<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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
     */
    public $outstanding_balance;

    /**
     * @var array<CycleExecution>
     * The trial and regular billing executions.
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

    public function validate()
    {
        assert(isset($this->outstanding_balance));
        assert(isset($this->last_payment));
        assert(!isset($this->next_billing_time) || strlen($this->next_billing_time) >= 20);
        assert(!isset($this->next_billing_time) || strlen($this->next_billing_time) <= 64);
        assert(isset($this->next_payment));
        assert(!isset($this->final_payment_time) || strlen($this->final_payment_time) >= 20);
        assert(!isset($this->final_payment_time) || strlen($this->final_payment_time) <= 64);
        assert(isset($this->last_failed_payment));
        assert(isset($this->total_paid_amount));
    }
}
