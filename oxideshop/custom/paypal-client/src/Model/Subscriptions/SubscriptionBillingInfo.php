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

    /** @var array<CycleExecution> */
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
     */
    public $final_payment_time;

    /** @var integer */
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
}
