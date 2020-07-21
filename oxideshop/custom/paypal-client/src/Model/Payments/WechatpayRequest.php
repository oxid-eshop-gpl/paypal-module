<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * Information needed to pay using WeChat Pay.
 */
class WechatpayRequest
{
	/** @var string */
	public $name;

	/** @var string */
	public $country_code;
}
