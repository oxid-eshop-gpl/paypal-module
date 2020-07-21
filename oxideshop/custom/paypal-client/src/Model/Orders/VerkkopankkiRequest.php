<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information needed to pay using Verkkopankki (Finnish Online Banking).
 */
class VerkkopankkiRequest
{
	/** @var string */
	public $name;

	/** @var string */
	public $email;

	/** @var string */
	public $country_code;

	/** @var string */
	public $bank_id;
}
