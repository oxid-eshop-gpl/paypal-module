<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information used to pay Bancontact.
 */
class Bancontact implements \JsonSerializable
{
	/** @var string */
	public $name;

	/** @var string */
	public $country_code;

	/** @var string */
	public $bic;

	/** @var string */
	public $iban_last_chars;

	/** @var string */
	public $card_last_digits;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
