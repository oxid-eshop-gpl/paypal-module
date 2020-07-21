<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information needed to pay using BLIK.
 */
class BlikRequest
{
	/** @var string */
	public $name;

	/** @var string */
	public $country_code;

	/** @var string */
	public $email;
}
