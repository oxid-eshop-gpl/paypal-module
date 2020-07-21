<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * ACH bank details response object
 */
class AchDebitResponse
{
	/** @var string */
	public $last_digits;

	/** @var string */
	public $routing_number;

	/** @var string */
	public $account_holder_name;
}
