<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Person information.
 */
class Person extends \Party implements \JsonSerializable
{
	/** @var array */
	public $names;

	/** @var string */
	public $citizenship;

	/** @var string */
	public $birth_date;

	/** @var array */
	public $identifications;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
