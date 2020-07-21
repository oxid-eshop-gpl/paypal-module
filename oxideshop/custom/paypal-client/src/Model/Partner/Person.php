<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * Details of the person or party.
 */
class Person
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
}
