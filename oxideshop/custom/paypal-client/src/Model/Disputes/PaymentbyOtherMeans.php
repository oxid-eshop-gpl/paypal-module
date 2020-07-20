<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

/**
 * The payment by other means details.
 */
class PaymentbyOtherMeans
{
	/** @var boolean */
	public $charge_different_from_original;

	/** @var boolean */
	public $received_duplicate;

	/** @var string */
	public $payment_method;

	/** @var string */
	public $payment_instrument_suffix;
}
