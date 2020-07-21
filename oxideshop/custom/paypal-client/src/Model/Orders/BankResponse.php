<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The bank source used to fund the payment
 */
class BankResponse implements \JsonSerializable
{
	/** @var AchDebitResponse */
	public $ach_debit;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
