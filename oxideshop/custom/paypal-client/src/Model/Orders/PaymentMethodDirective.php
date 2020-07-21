<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

class PaymentMethodDirective
{
	/** @var string */
	public $payment_processing_type;

	/** @var string */
	public $processing_decision;

	/** @var array */
	public $reason;
}
