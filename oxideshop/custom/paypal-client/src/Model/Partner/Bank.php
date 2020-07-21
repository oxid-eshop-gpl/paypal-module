<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The bank account information.
 */
class Bank
{
	/** @var string */
	public $nick_name;

	/** @var string */
	public $account_number;

	/** @var string */
	public $account_type;

	/** @var string */
	public $currency_code;

	/** @var array */
	public $identifiers;

	/** @var AddressPortable */
	public $branch_location;

	/** @var Mandate */
	public $mandate;
}
