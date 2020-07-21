<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The reason for the dispute.
 */
class ExistingReason implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
