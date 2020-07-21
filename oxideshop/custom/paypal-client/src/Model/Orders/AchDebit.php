<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * ACH bank details required to fund the payment.
 */
class AchDebit
{
	/** @var string */
	public $account_number;

	/** @var string */
	public $routing_number;

	/** @var string */
	public $account_type;

	/** @var string */
	public $account_holder_name;
}
