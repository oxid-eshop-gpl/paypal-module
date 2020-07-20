<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information used to pay using eps.
 */
class Eps
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\FullName */
	public $name;

	/** @var OxidProfessionalServices\PayPal\Api\Model\CountryCode */
	public $country_code;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Bic */
	public $bic;
}
