<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * Information needed to pay using Trustly.
 */
class TrustlyRequest
{
	/** @var string */
	public $name;

	/** @var string */
	public $country_code;
}
