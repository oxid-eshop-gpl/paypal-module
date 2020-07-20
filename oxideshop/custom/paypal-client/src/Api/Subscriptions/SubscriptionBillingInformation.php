<?php

namespace OxidProfessionalServices\PayPal\Api\Subscriptions;

/**
 * The billing details for the subscription. If the subscription was or is active, these fields are populated.
 */
class SubscriptionBillingInformation
{
	/** @var array */
	public $cycle_executions;

	/** @var integer */
	public $failed_payments_count;
}
