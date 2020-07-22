<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The roll-out strategy for a pricing scheme update. After the pricing update, all new subscriptions are based
 * on this pricing scheme and the values in this object determine the behavior for the existing subscriptions.
 *
 * generated from: roll_out_strategy.json
 */
class RollOutStrategy implements JsonSerializable
{
    use BaseModel;

    /** The pricing change takes effect from the next billing payment after the effective time. */
    const PROCESS_CHANGE_FROM_NEXT_PAYMENT = 'NEXT_PAYMENT';

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
     * @var string
     * The date and time when this pricing change goes into effect, in [Internet date and time
     * format](https://tools.ietf.org/html/rfc3339#section-5.6). Applies only if the plan's pricing scheme is
     * updated.
     *
     * use one of constants defined in this class to set the value:
     * @see PROCESS_CHANGE_FROM_NEXT_PAYMENT
     * minLength: 1
     * maxLength: 30
     */
    public $process_change_from;

    public function validate()
    {
        assert(!isset($this->effective_time) || strlen($this->effective_time) >= 20);
        assert(!isset($this->effective_time) || strlen($this->effective_time) <= 64);
        assert(!isset($this->process_change_from) || strlen($this->process_change_from) >= 1);
        assert(!isset($this->process_change_from) || strlen($this->process_change_from) <= 30);
    }
}
