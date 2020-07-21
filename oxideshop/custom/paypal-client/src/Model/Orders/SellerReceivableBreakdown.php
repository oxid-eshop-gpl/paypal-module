<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The detailed breakdown of the capture activity.
 */
class SellerReceivableBreakdown
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Money */
	public $gross_amount;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Money */
	public $paypal_fee;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Money */
	public $paypal_fee_in_receivable_currency;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Money */
	public $net_amount;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Money */
	public $receivable_amount;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\ExchangeRate */
	public $exchange_rate;

	/** @var array */
	public $platform_fees;
}
