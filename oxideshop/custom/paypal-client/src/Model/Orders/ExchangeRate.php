<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The exchange rate that determines the amount to convert from one currency to another currency.
 */
class ExchangeRate
{
	/** @var string */
	public $source_currency;

	/** @var string */
	public $target_currency;

	/** @var string */
	public $value;
}
