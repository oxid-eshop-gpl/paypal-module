<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Person information.
 */
class Person extends \Party
{
	/** @var array */
	public $names;

	/** @var string */
	public $citizenship;

	/** @var string */
	public $birth_date;

	/** @var array */
	public $identifications;
}
