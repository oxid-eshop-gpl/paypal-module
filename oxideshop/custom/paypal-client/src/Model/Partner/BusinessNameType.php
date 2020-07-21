<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * Business name type
 */
class BusinessNameType implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
