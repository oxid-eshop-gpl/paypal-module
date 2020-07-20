<?php

namespace OxidProfessionalServices\PayPal\Model\Orders;

/**
 * The details for the items to be purchased.
 */
class Item
{
	/** @var string */
	public $name;

	/** @var string */
	public $quantity;

	/** @var string */
	public $description;

	/** @var string */
	public $sku;

	/** @var string */
	public $category;
}
