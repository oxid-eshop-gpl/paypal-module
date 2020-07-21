<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The breakdown of the amount. Breakdown provides details such as total item amount, total tax amount, shipping, handling, insurance, and discounts, if any.
 */
class AmountBreakdown
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Money */
	public $item_total;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Money */
	public $shipping;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Money */
	public $handling;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Money */
	public $tax_total;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Money */
	public $insurance;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Money */
	public $shipping_discount;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Money */
	public $discount;
}
