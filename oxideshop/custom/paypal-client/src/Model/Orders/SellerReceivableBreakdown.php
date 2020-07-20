<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The detailed breakdown of the capture activity.
 */
class SellerReceivableBreakdown
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $gross_amount;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $paypal_fee;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $paypal_fee_in_receivable_currency;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $net_amount;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $receivable_amount;

	/** @var OxidProfessionalServices\PayPal\Api\Model\ExchangeRate */
	public $exchange_rate;
	public $platform_fees;
}
