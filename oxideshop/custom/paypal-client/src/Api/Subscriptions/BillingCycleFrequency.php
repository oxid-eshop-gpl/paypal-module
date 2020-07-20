<?php

namespace OxidProfessionalServices\PayPal\Api\Subscriptions;

/**
 * The frequency of the billing cycle.
 */
class BillingCycleFrequency
{
	/** @var string */
	public $interval_unit;

	/** @var integer */
	public $interval_count;
}
