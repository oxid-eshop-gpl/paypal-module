<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The last characters of the IBAN used to pay.
 */
class IbanLastChars implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
