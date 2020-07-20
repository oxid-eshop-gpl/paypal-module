<?php

namespace OxidProfessionalServices\PayPal\Api\Partner;

/**
 * The bank account information.
 */
class BankAccount
{
	/** @var string */
	public $nick_name;

	/** @var string */
	public $account_number;

	/** @var string */
	public $account_type;

	/** @var array */
	public $identifiers;
}
