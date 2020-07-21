<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * Financial instruments attached to this account.
 */
class FinancialInstruments implements \JsonSerializable
{
	/** @var array */
	public $banks;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
