<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The currency range, from the minimum inclusive amount to the maximum inclusive amount.
 */
class CurrencyRange implements \JsonSerializable
{
	/** @var Money */
	public $minimum_amount;

	/** @var Money */
	public $maximum_amount;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
