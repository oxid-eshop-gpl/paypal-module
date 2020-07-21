<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The date and time stamps that are common to authorized payment, captured payment, and refund transactions.
 */
class ActivityTimestamps
{
	/** @var string */
	public $create_time;

	/** @var string */
	public $update_time;
}
