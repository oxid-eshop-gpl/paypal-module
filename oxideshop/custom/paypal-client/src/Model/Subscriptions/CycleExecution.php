<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->tenure_type) || Assert::minLength($this->tenure_type, 1, "tenure_type in CycleExecution must have minlength of 1 $within");
        !isset($this->tenure_type) || Assert::maxLength($this->tenure_type, 24, "tenure_type in CycleExecution must have maxlength of 24 $within");
        !isset($this->amount_payable_per_cycle) || Assert::notNull($this->amount_payable_per_cycle->currency_code, "currency_code in amount_payable_per_cycle must not be NULL within CycleExecution $within");
        !isset($this->amount_payable_per_cycle) || Assert::notNull($this->amount_payable_per_cycle->value, "value in amount_payable_per_cycle must not be NULL within CycleExecution $within");
        !isset($this->amount_payable_per_cycle) || Assert::isInstanceOf($this->amount_payable_per_cycle, Money::class, "amount_payable_per_cycle in CycleExecution must be instance of Money $within");
        !isset($this->amount_payable_per_cycle) || $this->amount_payable_per_cycle->validate(CycleExecution::class);
    }

    public function __construct()
    {
    }
}
