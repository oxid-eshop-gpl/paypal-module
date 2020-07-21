<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The currency and amount for a financial transaction, such as a balance or payment due.
 */
class Money
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\CurrencyCode */
	public $currency_code;

	/** @var string */
	public $value;
}
