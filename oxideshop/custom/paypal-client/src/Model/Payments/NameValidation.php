<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

class NameValidation implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
