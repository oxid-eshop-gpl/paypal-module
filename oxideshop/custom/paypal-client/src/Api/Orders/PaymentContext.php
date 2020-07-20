<?php

namespace OxidProfessionalServices\PayPal\Api\Orders;

/**
 * Payment context data required for processing payments for an order.
 */
class PaymentContext
{
	/** @var array */
	public $facilitators;

	/** @var array */
	public $payment_units;
}
