<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The identity document type.
 */
class IdentityDocumentType implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
