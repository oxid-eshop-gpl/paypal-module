<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The PayPal product for which the customer is onboarded.
 */
class Product implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
