<?php

namespace OxidProfessionalServices\PayPal\Api\Orders;

/**
 * The purchase unit details. Used to capture required information for the payment contract.
 */
class PurchaseUnit
{
	/** @var string */
	public $reference_id;

	/** @var string */
	public $description;

	/** @var string */
	public $custom_id;

	/** @var string */
	public $invoice_id;

	/** @var string */
	public $id;

	/** @var string */
	public $soft_descriptor;

	/** @var array */
	public $items;
}
