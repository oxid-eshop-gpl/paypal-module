<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The purchase unit details. Used to capture required information for the payment contract.
 */
class PurchaseUnit implements \JsonSerializable
{
	/** @var string */
	public $reference_id;

	/** @var AmountWithBreakdown */
	public $amount;

	/** @var Payee */
	public $payee;

	/** @var PaymentInstruction */
	public $payment_instruction;

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

	/** @var ShippingDetail */
	public $shipping;

	/** @var SupplementaryData */
	public $supplementary_data;

	/** @var PaymentCollection */
	public $payments;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
