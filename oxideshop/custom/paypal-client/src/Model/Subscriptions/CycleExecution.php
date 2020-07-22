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

    /** @var string */
    public $tenure_type;

    /** @var integer */
    public $sequence;

    /** @var integer */
    public $cycles_completed;

    /** @var integer */
    public $cycles_remaining;

    /** @var integer */
    public $current_pricing_scheme_version;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount_payable_per_cycle;

    /** @var integer */
    public $total_cycles;
}
