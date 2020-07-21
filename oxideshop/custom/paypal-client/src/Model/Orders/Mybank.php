<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information used to pay using MyBank.
 */
class Mybank
{
	/** @var string */
	public $name;

	/** @var string */
	public $country_code;

	/** @var string */
	public $bic;

	/** @var string */
	public $iban_last_chars;
}
