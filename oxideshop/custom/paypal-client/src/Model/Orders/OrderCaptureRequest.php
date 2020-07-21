<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Completes an capture payment for an order.
 */
class OrderCaptureRequest
{
	/** @var PaymentSource */
	public $payment_source;
}
