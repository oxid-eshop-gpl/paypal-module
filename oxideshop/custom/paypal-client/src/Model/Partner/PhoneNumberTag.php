<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * Tag associated with the phone number.
 */
class PhoneNumberTag implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
