<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Liability shift indicator. The outcome of the issuer's authentication.
 */
class LiabilityShift implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
