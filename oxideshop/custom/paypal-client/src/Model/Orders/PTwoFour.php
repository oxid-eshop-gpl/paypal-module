<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information used to pay using P24(Przelewy24)
 */
class PTwoFour
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\FullName */
	public $name;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\EmailAddress */
	public $email;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\CountryCode */
	public $country_code;

	/** @var string */
	public $payment_descriptor;

	/** @var string */
	public $method_id;

	/** @var string */
	public $method_description;
}
