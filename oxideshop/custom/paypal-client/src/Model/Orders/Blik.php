<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information used to pay using BLIK
 */
class Blik
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\FullName */
	public $name;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\CountryCode */
	public $country_code;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\EmailAddress */
	public $email;
}
