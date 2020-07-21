<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information used to pay using Sofort.
 */
class Sofort
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\FullName */
	public $name;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\CountryCode */
	public $country_code;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Bic */
	public $bic;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\IbanLastChars */
	public $iban_last_chars;
}
