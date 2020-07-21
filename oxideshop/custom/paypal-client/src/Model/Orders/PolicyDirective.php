<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Policy directive indicating how to process the payment.
 */
class PolicyDirective
{
	/** @var string */
	public $payment_decision;

	/** @var array */
	public $reason;
}
