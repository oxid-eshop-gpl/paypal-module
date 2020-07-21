<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The order request details.
 */
class OrderRequest implements \JsonSerializable
{
	/** @var string */
	public $intent;

	/** @var string */
	public $processing_instruction;

	/** @var Payer */
	public $payer;

	/** @var array */
	public $purchase_units;

	/** @var PaymentSource */
	public $payment_source;

	/** @var OrderApplicationContext */
	public $application_context;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
