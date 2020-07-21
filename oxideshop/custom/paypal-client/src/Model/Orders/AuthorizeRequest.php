<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

class AuthorizeRequest
{
	/** @var PaymentSource */
	public $payment_source;

	/** @var string */
	public $reference_id;

	/** @var Money */
	public $amount;
}
