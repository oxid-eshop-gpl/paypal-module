<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The API caller can opt in to verify the card through PayPal offered verification services (e.g. Smart Dollar Auth, 3DS).
 */
class CardVerification implements \JsonSerializable
{
	/** @var string */
	public $method;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
