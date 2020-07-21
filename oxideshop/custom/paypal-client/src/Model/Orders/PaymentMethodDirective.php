<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Directives for certain payment methods based on eligibility.
 */
class PaymentMethodDirective implements \JsonSerializable
{
	/** @var string */
	public $payment_processing_type;

	/** @var string */
	public $processing_decision;

	/** @var array */
	public $reason;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
