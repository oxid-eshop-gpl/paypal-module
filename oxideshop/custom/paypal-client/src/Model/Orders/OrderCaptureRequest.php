<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Completes an capture payment for an order.
 */
class OrderCaptureRequest implements \JsonSerializable
{
	/** @var PaymentSource */
	public $payment_source;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
