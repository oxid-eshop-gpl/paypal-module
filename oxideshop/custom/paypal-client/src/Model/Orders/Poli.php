<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information used to pay using POLi.
 */
class Poli
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\FullName */
	public $name;

	/** @var OxidProfessionalServices\PayPal\Api\Model\CountryCode */
	public $country_code;
}
