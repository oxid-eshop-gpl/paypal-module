<?php

namespace OxidProfessionalServices\PayPal\Model\Orders;

/**
 * Encapsulates the properties of user account.
 */
class Account
{
	/** @var string */
	public $account_number;

	/** @var string */
	public $registration_type;

	/** @var array */
	public $account_tags;

	/** @var string */
	public $status;

	/** @var string */
	public $pricing_category;

	/** @var string */
	public $legal_entity;
}
