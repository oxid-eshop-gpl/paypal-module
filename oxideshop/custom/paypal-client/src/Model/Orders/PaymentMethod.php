<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The customer and merchant payment preferences.
 */
class PaymentMethod
{
	/** @var string */
	public $payer_selected;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\PayeePaymentMethodPreference */
	public $payee_preferred;

	/** @var string */
	public $standard_entry_class_code;
}
