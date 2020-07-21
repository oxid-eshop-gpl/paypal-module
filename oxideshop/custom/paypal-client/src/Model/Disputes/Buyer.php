<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The details for the customer who funds the payment. For example, the customer's first name, last name, and email address.
 */
class Buyer implements \JsonSerializable
{
	/** @var string */
	public $email;

	/** @var string */
	public $payer_id;

	/** @var string */
	public $name;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
