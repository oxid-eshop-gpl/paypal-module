<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The customer and merchant payment preferences.
 */
class PaymentMethod implements \JsonSerializable
{
	/** @var string */
	public $payer_selected;

	/** @var string */
	public $payee_preferred;

	/** @var string */
	public $standard_entry_class_code;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
