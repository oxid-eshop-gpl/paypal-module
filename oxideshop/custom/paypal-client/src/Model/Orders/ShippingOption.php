<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The options that the payee or merchant offers to the payer to ship or pick up their items.
 */
class ShippingOption
{
	/** @var string */
	public $id;

	/** @var string */
	public $label;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\ShippingType */
	public $type;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Money */
	public $amount;

	/** @var boolean */
	public $selected;
}
