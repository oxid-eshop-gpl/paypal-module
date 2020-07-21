<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The authorization of an order request.
 */
class OrderAuthorizeRequest
{
	/** @var PaymentSource */
	public $payment_source;

	/** @var string */
	public $reference_id;

	/** @var Money */
	public $amount;
}
