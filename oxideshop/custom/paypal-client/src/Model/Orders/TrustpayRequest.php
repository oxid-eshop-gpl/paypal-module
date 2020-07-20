<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information needed to pay using TrustPay.
 */
class TrustpayRequest
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\FullName */
	public $name;

	/** @var OxidProfessionalServices\PayPal\Api\Model\CountryCode */
	public $country_code;
}
