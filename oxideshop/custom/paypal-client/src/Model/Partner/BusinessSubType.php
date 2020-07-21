<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * Sub classification of the business type
 */
class BusinessSubType implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
