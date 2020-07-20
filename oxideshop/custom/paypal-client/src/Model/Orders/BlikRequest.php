<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information needed to pay using BLIK.
 */
class BlikRequest
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\FullName */
	public $name;

	/** @var OxidProfessionalServices\PayPal\Api\Model\CountryCode */
	public $country_code;

	/** @var OxidProfessionalServices\PayPal\Api\Model\EmailAddress */
	public $email;
}
