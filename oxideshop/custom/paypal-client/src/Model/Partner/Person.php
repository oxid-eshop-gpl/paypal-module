<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * Details of the person or party.
 */
class Person implements \JsonSerializable
{
	/** @var string */
	public $id;

	/** @var string */
	public $party_id;

	/** @var array */
	public $names;

	/** @var string */
	public $citizenship;

	/** @var array */
	public $addresses;

	/** @var array */
	public $phones;

	/** @var BirthDetails */
	public $birth_details;

	/** @var array */
	public $documents;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
