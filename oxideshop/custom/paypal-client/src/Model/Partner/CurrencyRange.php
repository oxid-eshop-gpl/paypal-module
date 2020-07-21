<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The currency range, from the minimum inclusive amount to the maximum inclusive amount.
 */
class CurrencyRange
{
	/** @var Money */
	public $minimum_amount;

	/** @var Money */
	public $maximum_amount;
}
