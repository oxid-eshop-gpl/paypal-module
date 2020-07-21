<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Phone information.
 */
class PhoneInfo implements \JsonSerializable
{
	/** @var Phone */
	public $phone_number;

	/** @var string */
	public $phone_type;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
