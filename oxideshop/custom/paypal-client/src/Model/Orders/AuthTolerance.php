<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Auth-Capture Tolerance details.
 */
class AuthTolerance
{
	/** @var string */
	public $percent;

	/** @var Money */
	public $absolute;
}
