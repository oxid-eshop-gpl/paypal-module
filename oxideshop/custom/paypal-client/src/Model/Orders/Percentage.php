<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The percentage, as a fixed-point, signed decimal number. For example, define a 19.99% interest rate as `19.99`.
 */
class Percentage implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
