<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

class BillingCycleExecutionDetails
{
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

	/** @var integer */
	public $total_cycles;
}
