<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The exchange rate that determines the amount to convert from one currency to another currency.
 */
class ExchangeRate
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\CurrencyCode */
	public $source_currency;

	/** @var OxidProfessionalServices\PayPal\Api\Model\CurrencyCode */
	public $target_currency;

	/** @var string */
	public $value;
}
