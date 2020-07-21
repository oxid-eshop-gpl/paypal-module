<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information used to pay using P24(Przelewy24)
 */
class PTwoFour
{
	/** @var string */
	public $name;

	/** @var string */
	public $email;

	/** @var string */
	public $country_code;

	/** @var string */
	public $payment_descriptor;

	/** @var string */
	public $method_id;

	/** @var string */
	public $method_description;
}
