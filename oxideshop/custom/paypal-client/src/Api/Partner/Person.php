<?php

namespace OxidProfessionalServices\PayPal\Api\Partner;

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

	/** @var array */
	public $addresses;

	/** @var array */
	public $phones;

	/** @var array */
	public $documents;
}
