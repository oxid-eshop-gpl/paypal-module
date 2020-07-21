<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * Information needed to pay using Alipay
 */
class AlipayRequest
{
	/** @var string */
	public $name;

	/** @var string */
	public $country_code;
}
