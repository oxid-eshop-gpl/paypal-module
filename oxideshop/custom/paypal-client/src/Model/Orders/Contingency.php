<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * An action to be taken on a payment method to validate it.
 */
class Contingency implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
