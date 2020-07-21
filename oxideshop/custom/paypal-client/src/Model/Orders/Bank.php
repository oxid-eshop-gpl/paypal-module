<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The bank source used to fund the payment
 */
class Bank implements \JsonSerializable
{
	/** @var AchDebit */
	public $ach_debit;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
