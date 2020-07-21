<?php

namespace OxidProfessionalServices\PayPal\Model\Subscriptions;

/**
 * The billing cycle details.
 */
class BillingCycle
{
	/** @var string */
	public $tenure_type;

	/** @var integer */
	public $sequence;

	/** @var integer */
	public $total_cycles;
}
