<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The net amount. Returned when the currency of the refund is different from the currency of the PayPal account where the merchant holds their funds.
 */
class NetAmountBreakdownItem implements \JsonSerializable
{
	/** @var Money */
	public $payable_amount;

	/** @var Money */
	public $converted_amount;

	/** @var ExchangeRate */
	public $exchange_rate;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
