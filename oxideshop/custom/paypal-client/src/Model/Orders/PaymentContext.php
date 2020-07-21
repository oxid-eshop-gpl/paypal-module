<?php

namespace OxidProfessionalServices\PayPal\Model\Orders;

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
