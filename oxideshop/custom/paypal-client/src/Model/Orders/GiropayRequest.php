<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information needed to pay using giropay.
 */
class GiropayRequest
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\FullName */
	public $name;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\CountryCode */
	public $country_code;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Bic */
	public $bic;
}
