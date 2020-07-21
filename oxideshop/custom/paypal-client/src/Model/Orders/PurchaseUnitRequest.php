<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

class PurchaseUnitRequest
{
	/** @var string */
	public $reference_id;

	/** @var PaymentInstruction */
	public $payment_instruction;

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

	/** @var ShippingDetail */
	public $shipping;

	/** @var SupplementaryData */
	public $supplementary_data;
}
