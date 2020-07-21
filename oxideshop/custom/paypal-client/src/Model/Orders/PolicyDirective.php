<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Policy directive indicating how to process the payment.
 */
class PolicyDirective implements \JsonSerializable
{
	/** @var string */
	public $payment_decision;

	/** @var array */
	public $reason;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
