<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The details for the items to be purchased.
 */
class Item
{
	public $name;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $unit_amount;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $tax;
	public $quantity;
	public $description;
	public $sku;
	public $category;
}
