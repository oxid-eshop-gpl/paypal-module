<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

class AddressPortablePostalCodeValidation implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
