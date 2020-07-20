<?php

namespace OxidProfessionalServices\PayPal\Api\Orders;

/**
 * Auth directives for the transaction.
 */
class AuthDirectives
{
	/** @var integer */
	public $honor_time_offset;

	/** @var integer */
	public $expiry_time_offset;

	/** @var boolean */
	public $allow_multiple_captures;
}
