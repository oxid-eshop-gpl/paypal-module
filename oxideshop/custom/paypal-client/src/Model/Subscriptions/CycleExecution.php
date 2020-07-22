<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The regular and trial execution details for a billing cycle.
 *
 * generated from: cycle_execution.json
 */
class CycleExecution implements JsonSerializable
{
    use BaseModel;

    /** A regular billing cycle. */
    const TENURE_TYPE_REGULAR = 'REGULAR';

    /** A trial billing cycle. */
    const TENURE_TYPE_TRIAL = 'TRIAL';

    /**
     * @var string
     * The type of the billing cycle.
     *
     * use one of constants defined in this class to set the value:
     * @see TENURE_TYPE_REGULAR
     * @see TENURE_TYPE_TRIAL
     * minLength: 1
     * maxLength: 24
     */
    public $tenure_type;

    /**
     * @var integer
     * The order in which to run this cycle among other billing cycles.
     */
    public $sequence;

    /**
     * @var integer
     * The number of billing cycles that have completed.
     */
    public $cycles_completed;

    /**
     * @var integer
     * For a finite billing cycle, cycles_remaining is the number of remaining cycles. For an infinite billing cycle,
     * cycles_remaining is set as 0.
     */
    public $cycles_remaining;

    /**
     * @var integer
     * The active pricing scheme version for the billing cycle.
     */
    public $current_pricing_scheme_version;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount_payable_per_cycle;

    /**
     * @var integer
     * The number of times this billing cycle gets executed. Trial billing cycles can only be executed a finite
     * number of times (value between <code>1</code> and <code>999</code> for <code>total_cycles</code>). Regular
     * billing cycles can be executed infinite times (value of <code>0</code> for <code>total_cycles</code>) or a
     * finite number of times (value between <code>1</code> and <code>999</code> for <code>total_cycles</code>).
     */
    public $total_cycles;
}
