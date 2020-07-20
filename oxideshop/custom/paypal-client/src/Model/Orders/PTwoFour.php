<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information used to pay using P24(Przelewy24)
 */
class PTwoFour
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\FullName */
	public $name;

	/** @var OxidProfessionalServices\PayPal\Api\Model\EmailAddress */
	public $email;

	/** @var OxidProfessionalServices\PayPal\Api\Model\CountryCode */
	public $country_code;
	public $payment_descriptor;
	public $method_id;
	public $method_description;
}
