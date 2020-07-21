<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

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
