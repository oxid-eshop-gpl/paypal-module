<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Payment context data required for processing payments for an order.
 */
class PaymentContextData implements \JsonSerializable
{
	/** @var string */
	public $intent;

	/** @var OrderApplicationContext */
	public $application_context;

	/** @var array */
	public $facilitators;

	/** @var array */
	public $payment_units;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
