<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

class Card
{
	/** @var string */
	public $id;

	/** @var string */
	public $name;

	/** @var string */
	public $number;

	/** @var string */
	public $security_code;

	/** @var string */
	public $last_digits;

	/** @var array */
	public $authentication_results;
}
