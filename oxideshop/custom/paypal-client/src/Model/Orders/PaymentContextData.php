<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Payment context data required for processing payments for an order.
 */
class PaymentContextData
{
	/** @var string */
	public $intent;

	/** @var OrderApplicationContext */
	public $application_context;

	/** @var array */
	public $facilitators;

	/** @var array */
	public $payment_units;
}
