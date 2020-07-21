<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The bank source used to fund the payment
 */
class BankResponse
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\AchDebitResponse */
	public $ach_debit;
}
