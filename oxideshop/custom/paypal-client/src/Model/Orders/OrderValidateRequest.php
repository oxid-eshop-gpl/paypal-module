<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Completes an action for an order.
 */
class OrderValidateRequest
{
	/** @var ExtendedPaymentSource */
	public $payment_source;

	/** @var OrderValidateApplicationContext */
	public $application_context;
}
