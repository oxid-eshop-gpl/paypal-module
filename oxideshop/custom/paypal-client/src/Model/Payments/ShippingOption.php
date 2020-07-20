<?php

namespace OxidProfessionalServices\PayPal\Model\Payments;

/**
 * The options that the payee or merchant offers to the payer to ship or pick up their items.
 */
class ShippingOption
{
	/** @var string */
	public $id;

	/** @var string */
	public $label;

	/** @var boolean */
	public $selected;
}
