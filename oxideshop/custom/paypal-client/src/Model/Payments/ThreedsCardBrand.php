<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * Card brand that the transaction was processed for authentication.
 */
class ThreedsCardBrand implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
