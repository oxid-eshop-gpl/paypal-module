<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * Information needed to pay using TrustPay.
 */
class TrustpayRequest
{
	/** @var string */
	public $name;

	/** @var string */
	public $country_code;
}
