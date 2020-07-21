<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

class BusinessNameValidation implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
