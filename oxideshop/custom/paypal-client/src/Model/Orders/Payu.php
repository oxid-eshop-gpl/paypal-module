<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information needed to pay using PayU.
 */
class Payu
{
	/** @var string */
	public $name;

	/** @var string */
	public $email;

	/** @var string */
	public $country_code;
}
