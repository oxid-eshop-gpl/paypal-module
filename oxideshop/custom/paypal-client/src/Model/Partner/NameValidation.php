<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

class NameValidation implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
