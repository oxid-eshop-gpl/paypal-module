<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The frequency of the billing cycle.
 */
class Frequency
{
	/** @var string */
	public $interval_unit;

	/** @var integer */
	public $interval_count;
}
