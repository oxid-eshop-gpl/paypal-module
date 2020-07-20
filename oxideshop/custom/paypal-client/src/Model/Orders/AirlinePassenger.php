<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The airline passenger details.
 */
class AirlinePassenger
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Name */
	public $name;

	/** @var OxidProfessionalServices\PayPal\Api\Model\DateNoTime */
	public $date_of_birth;

	/** @var OxidProfessionalServices\PayPal\Api\Model\CountryCode */
	public $country_code;
	public $customer_code;
}
