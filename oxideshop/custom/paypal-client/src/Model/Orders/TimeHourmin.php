<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The time, in the hh:mm 24 Hr format.
 */
class TimeHourmin implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
