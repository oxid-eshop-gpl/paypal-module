<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information needed to pay using eps.
 */
class EpsRequest
{
	/** @var string */
	public $name;

	/** @var string */
	public $country_code;
}
