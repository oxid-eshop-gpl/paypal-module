<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The business name of the party.
 */
class BusinessName implements \JsonSerializable
{
	/** @var string */
	public $business_name;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
