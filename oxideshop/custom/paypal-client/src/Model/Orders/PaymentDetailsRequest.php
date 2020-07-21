<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Payment details for an order.
 */
class PaymentDetailsRequest implements \JsonSerializable
{
	/** @var PaymentSource */
	public $payment_source;

	/** @var array */
	public $purchase_units;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
