<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The breakdown details for the amount. Includes the gross, tax, fee, and shipping amounts.
 */
class AmountWithBreakdown implements \JsonSerializable
{
	/** @var Money */
	public $gross_amount;

	/** @var Money */
	public $fee_amount;

	/** @var Money */
	public $shipping_amount;

	/** @var Money */
	public $tax_amount;

	/** @var Money */
	public $net_amount;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
