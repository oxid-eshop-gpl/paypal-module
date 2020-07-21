<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The business name of the party.
 */
class BusinessName implements \JsonSerializable
{
	/** @var string */
	public $business_name;

	/** @var string */
	public $orthography;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
