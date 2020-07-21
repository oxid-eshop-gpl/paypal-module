<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The currency and amount for a financial transaction, such as a balance or payment due.
 */
class Money
{
	/** @var string */
	public $currency_code;

	/** @var string */
	public $value;
}
