<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The merchant-proposed offer type for the dispute.
 */
class OfferType implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
