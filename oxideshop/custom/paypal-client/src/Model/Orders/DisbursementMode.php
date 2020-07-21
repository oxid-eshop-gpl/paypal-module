<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The funds that are held on behalf of the merchant.
 */
class DisbursementMode implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
