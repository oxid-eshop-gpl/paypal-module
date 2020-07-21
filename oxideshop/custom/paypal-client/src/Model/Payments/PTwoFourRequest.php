<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * Information needed to pay using P24 (Przelewy24).
 */
class PTwoFourRequest
{
	/** @var string */
	public $name;

	/** @var string */
	public $email;

	/** @var string */
	public $country_code;
}
