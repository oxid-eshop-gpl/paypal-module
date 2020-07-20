<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The customer and merchant payment preferences.
 */
class PaymentMethod
{
	public $payer_selected;

	/** @var OxidProfessionalServices\PayPal\Api\Model\PayeePaymentMethodPreference */
	public $payee_preferred;
	public $standard_entry_class_code;
}
