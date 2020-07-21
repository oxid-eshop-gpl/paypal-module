<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The frequency of the billing cycle.
 */
class Frequency implements \JsonSerializable
{
	/** @var string */
	public $interval_unit;

	/** @var integer */
	public $interval_count;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
