<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The type and subtype of the business.
 */
class BusinessTypeInfo implements \JsonSerializable
{
	/** @var string */
	public $type;

	/** @var string */
	public $subtype;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
