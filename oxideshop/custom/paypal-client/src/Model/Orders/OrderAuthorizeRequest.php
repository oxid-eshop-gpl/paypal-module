<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The authorization of an order request.
 */
class OrderAuthorizeRequest implements \JsonSerializable
{
	/** @var PaymentSource */
	public $payment_source;

	/** @var string */
	public $reference_id;

	/** @var Money */
	public $amount;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
