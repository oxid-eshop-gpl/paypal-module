<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The net amount. Returned when the currency of the refund is different from the currency of the PayPal account where the merchant holds their funds.
 */
class NetAmountBreakdownItem
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $payable_amount;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $converted_amount;

	/** @var OxidProfessionalServices\PayPal\Api\Model\ExchangeRate */
	public $exchange_rate;
}
