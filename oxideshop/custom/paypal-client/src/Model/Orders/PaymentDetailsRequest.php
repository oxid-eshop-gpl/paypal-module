<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Payment details for an order.
 */
class PaymentDetailsRequest
{
	/** @var PaymentSource */
	public $payment_source;

	/** @var array */
	public $purchase_units;
}
