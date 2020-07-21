<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The dispute sub-reason.
 */
class SubReason implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
