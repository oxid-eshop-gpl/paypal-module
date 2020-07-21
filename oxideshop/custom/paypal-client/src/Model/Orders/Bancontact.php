<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information used to pay Bancontact.
 */
class Bancontact
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\FullName */
	public $name;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\CountryCode */
	public $country_code;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Bic */
	public $bic;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\IbanLastChars */
	public $iban_last_chars;

	/** @var string */
	public $card_last_digits;
}
