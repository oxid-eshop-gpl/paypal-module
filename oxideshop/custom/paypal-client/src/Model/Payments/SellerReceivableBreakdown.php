<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The detailed breakdown of the capture activity.
 */
class SellerReceivableBreakdown implements \JsonSerializable
{
	/** @var Money */
	public $gross_amount;

	/** @var Money */
	public $paypal_fee;

	/** @var Money */
	public $paypal_fee_in_receivable_currency;

	/** @var Money */
	public $net_amount;

	/** @var Money */
	public $receivable_amount;

	/** @var ExchangeRate */
	public $exchange_rate;

	/** @var array */
	public $platform_fees;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
