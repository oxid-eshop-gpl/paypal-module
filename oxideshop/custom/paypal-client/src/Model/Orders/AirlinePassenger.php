<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The airline passenger details.
 */
class AirlinePassenger
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Name */
	public $name;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\DateNoTime */
	public $date_of_birth;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\CountryCode */
	public $country_code;

	/** @var string */
	public $customer_code;
}
