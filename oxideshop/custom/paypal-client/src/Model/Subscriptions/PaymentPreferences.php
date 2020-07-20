<?php

namespace OxidProfessionalServices\PayPal\Model\Subscriptions;

/**
 * The payment preferences for a subscription.
 */
class PaymentPreferences
{
	/** @var string */
	public $service_type;

	/** @var boolean */
	public $auto_bill_outstanding;

	/** @var string */
	public $setup_fee_failure_action;

	/** @var integer */
	public $payment_failure_threshold;
}
