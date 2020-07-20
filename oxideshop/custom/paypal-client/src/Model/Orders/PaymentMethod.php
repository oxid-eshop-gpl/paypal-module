<?php

namespace OxidProfessionalServices\PayPal\Model\Orders;

/**
 * The customer and merchant payment preferences.
 */
class PaymentMethod
{
	/** @var string */
	public $payer_selected;

	/** @var string */
	public $standard_entry_class_code;
}
