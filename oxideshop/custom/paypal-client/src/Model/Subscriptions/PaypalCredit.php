<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The Buyer credit option used to fund the payment.
 */
class PaypalCredit implements \JsonSerializable
{
	/** @var string */
	public $id;

	/** @var string */
	public $type;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
