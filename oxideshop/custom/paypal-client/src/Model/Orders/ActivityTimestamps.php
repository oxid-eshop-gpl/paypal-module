<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The date and time stamps that are common to authorized payment, captured payment, and refund transactions.
 */
class ActivityTimestamps
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\DateTime */
	public $create_time;

	/** @var OxidProfessionalServices\PayPal\Api\Model\DateTime */
	public $update_time;
}
