<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

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
