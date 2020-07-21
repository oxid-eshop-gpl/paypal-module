<?php

namespace OxidProfessionalServices\PayPal\Model\Subscriptions;

/**
 * The customer and merchant payment preferences.
 */
class PaymentMethod
{
	/** @var string */
	public $payer_selected;

	/** @var string */
	public $payee_preferred;

	/** @var string */
	public $category;
}
