<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information used to pay using Verkkopankki (Finnish Online Banking).
 */
class Verkkopankki implements \JsonSerializable
{
	/** @var string */
	public $name;

	/** @var string */
	public $email;

	/** @var string */
	public $country_code;

	/** @var string */
	public $bank_name;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
