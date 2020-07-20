<?php

namespace OxidProfessionalServices\PayPal\Model\Subscriptions;

/**
 * The details for a bank account that can be used to fund a payment.
 */
class BankAccountResponse
{
	/** @var string */
	public $id;

	/** @var string */
	public $last_n_chars;

	/** @var string */
	public $bank_name;

	/** @var string */
	public $account_type;
}
