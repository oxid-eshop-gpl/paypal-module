<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information needed to pay using MyBank.
 */
class MybankRequest
{
	/** @var string */
	public $name;

	/** @var string */
	public $country_code;
}
