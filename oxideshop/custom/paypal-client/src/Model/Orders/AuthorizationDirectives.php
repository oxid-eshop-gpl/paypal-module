<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Auth directives for the transaction.
 */
class AuthorizationDirectives implements \JsonSerializable
{
	/** @var integer */
	public $honor_time_offset;

	/** @var integer */
	public $expiry_time_offset;

	/** @var boolean */
	public $allow_multiple_captures;

	/** @var AuthTolerance */
	public $tolerance;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
