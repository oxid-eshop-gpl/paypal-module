<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information needed to pay using Trustly.
 */
class Trustly implements \JsonSerializable
{
	/** @var string */
	public $name;

	/** @var string */
	public $country_code;

	/** @var string */
	public $bic;

	/** @var string */
	public $iban_last_chars;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
