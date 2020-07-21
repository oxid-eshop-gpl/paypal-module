<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

class AuthDirectives
{
	/** @var integer */
	public $honor_time_offset;

	/** @var integer */
	public $expiry_time_offset;

	/** @var boolean */
	public $allow_multiple_captures;
}
