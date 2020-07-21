<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

class AddressPortablePostalCodeValidation implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
