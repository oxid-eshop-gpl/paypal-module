<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Additional attributes associated with the use of this card
 */
class CardAttributes implements \JsonSerializable
{
	/** @var Customer */
	public $customer;

	/** @var CardVerification */
	public $verification;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
