<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Status of Authentication eligibility.
 */
class Enrolled implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
