<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The options that the payee or merchant offers to the payer to ship or pick up their items.
 */
class ShippingOption
{
	public $id;
	public $label;

	/** @var OxidProfessionalServices\PayPal\Api\Model\ShippingType */
	public $type;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $amount;
	public $selected;
}
