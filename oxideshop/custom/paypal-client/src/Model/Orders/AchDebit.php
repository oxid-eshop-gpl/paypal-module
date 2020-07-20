<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * ACH bank details required to fund the payment.
 */
class AchDebit
{
	public $account_number;
	public $routing_number;
	public $account_type;
	public $account_holder_name;
}
