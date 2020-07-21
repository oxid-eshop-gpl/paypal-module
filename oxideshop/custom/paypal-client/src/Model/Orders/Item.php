<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The details for the items to be purchased.
 */
class Item
{
	/** @var string */
	public $name;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Money */
	public $unit_amount;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Money */
	public $tax;

	/** @var string */
	public $quantity;

	/** @var string */
	public $description;

	/** @var string */
	public $sku;

	/** @var string */
	public $category;
}
