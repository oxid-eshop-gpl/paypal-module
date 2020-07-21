<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

class AddressPortablePostalCodeValidation implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
