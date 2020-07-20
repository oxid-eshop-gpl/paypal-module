<?php

namespace OxidProfessionalServices\PayPal\Model\Orders;

/**
 * Directives for certain payment methods based on eligibility.
 */
class PaymentMethodDirective
{
	/** @var string */
	public $payment_processing_type;

	/** @var string */
	public $processing_decision;

	/** @var array */
	public $reason;
}
