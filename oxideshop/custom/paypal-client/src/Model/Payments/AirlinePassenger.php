<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The airline passenger details.
 */
class AirlinePassenger implements \JsonSerializable
{
	/** @var Name */
	public $name;

	/** @var string */
	public $date_of_birth;

	/** @var string */
	public $country_code;

	/** @var string */
	public $customer_code;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
