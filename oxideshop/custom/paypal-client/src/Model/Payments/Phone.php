<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The phone number, in its canonical international [E.164 numbering plan format](https://www.itu.int/rec/T-REC-E.164/en).
 */
class Phone implements \JsonSerializable
{
	/** @var string */
	public $country_code;

	/** @var string */
	public $national_number;

	/** @var string */
	public $extension_number;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
