<?php

namespace OxidProfessionalServices\PayPal\Model\Orders;

/**
 * The purchase unit request. Includes required information for the payment contract.
 */
class PurchaseUnitRequest
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
	public $soft_descriptor;

	/** @var array */
	public $items;
}
