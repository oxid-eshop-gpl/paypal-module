<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Transaction signature status identifier.
 */
class SignatureVerificationStatus implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
