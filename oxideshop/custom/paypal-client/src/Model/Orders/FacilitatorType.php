<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Facilitator type.
 */
class FacilitatorType implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
