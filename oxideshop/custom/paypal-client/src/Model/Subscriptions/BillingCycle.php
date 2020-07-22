<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->pricing_scheme) || Assert::isInstanceOf($this->pricing_scheme, PricingScheme::class, "pricing_scheme in BillingCycle must be instance of PricingScheme $within");
        !isset($this->pricing_scheme) || $this->pricing_scheme->validate(BillingCycle::class);
        !isset($this->frequency) || Assert::notNull($this->frequency->interval_unit, "interval_unit in frequency must not be NULL within BillingCycle $within");
        !isset($this->frequency) || Assert::isInstanceOf($this->frequency, Frequency::class, "frequency in BillingCycle must be instance of Frequency $within");
        !isset($this->frequency) || $this->frequency->validate(BillingCycle::class);
        !isset($this->tenure_type) || Assert::minLength($this->tenure_type, 1, "tenure_type in BillingCycle must have minlength of 1 $within");
        !isset($this->tenure_type) || Assert::maxLength($this->tenure_type, 24, "tenure_type in BillingCycle must have maxlength of 24 $within");
    }

    public function __construct()
    {
    }
}
