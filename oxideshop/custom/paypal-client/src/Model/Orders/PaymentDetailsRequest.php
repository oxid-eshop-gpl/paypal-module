<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

class PaymentDetailsRequest
{
	/** @var PaymentSource */
	public $payment_source;

	/** @var array */
	public $purchase_units;
}
