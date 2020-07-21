<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Encapsulates the properties of user account.
 */
class Account implements \JsonSerializable
{
	/** @var string */
	public $account_number;

	/** @var string */
	public $account_id;

	/** @var string */
	public $tier;

	/** @var string */
	public $registration_type;

	/** @var string */
	public $legal_country_code;

	/** @var array */
	public $account_tags;

	/** @var string */
	public $status;

	/** @var string */
	public $pricing_category;

	/** @var string */
	public $legal_entity;

	/** @var string */
	public $time_created;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
