<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The stage in the dispute lifecycle.
 */
class DisputeLifecycleStage implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
