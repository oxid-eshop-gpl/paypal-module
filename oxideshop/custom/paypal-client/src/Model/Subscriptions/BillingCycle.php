<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The billing cycle details.
 *
 * generated from: billing_cycle.json
 */
class BillingCycle implements JsonSerializable
{
    use BaseModel;

    /** A regular billing cycle. */
    const TENURE_TYPE_REGULAR = 'REGULAR';

    /** A trial billing cycle. */
    const TENURE_TYPE_TRIAL = 'TRIAL';

    /**
     * @var PricingScheme
     * The pricing scheme details.
     */
    public $pricing_scheme;

    /**
     * @var Frequency
     * The frequency of the billing cycle.
     */
    public $frequency;

    /**
     * @var string
     * The tenure type of the billing cycle. In case of a plan having trial cycle, only 2 trial cycles are allowed
     * per plan.
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
     * The order in which this cycle is to run among other billing cycles. For example, a trial billing cycle has a
     * `sequence` of `1` while a regular billing cycle has a `sequence` of `2`, so that trial cycle runs before the
     * regular cycle.
     */
    public $sequence;

    /**
     * @var integer
     * The number of times this billing cycle gets executed. Trial billing cycles can only be executed a finite
     * number of times (value between <code>1</code> and <code>999</code> for <code>total_cycles</code>). Regular
     * billing cycles can be executed infinite times (value of <code>0</code> for <code>total_cycles</code>) or a
     * finite number of times (value between <code>1</code> and <code>999</code> for <code>total_cycles</code>).
     */
    public $total_cycles = 1;

    public function validate()
    {
        assert(isset($this->frequency));
        assert(!isset($this->tenure_type) || strlen($this->tenure_type) >= 1);
        assert(!isset($this->tenure_type) || strlen($this->tenure_type) <= 24);
    }
}
