<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

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
	public $category;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
