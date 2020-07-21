<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information needed to pay using Sofort.
 */
class SofortRequest
{
	/** @var string */
	public $name;

	/** @var string */
	public $country_code;

	/** @var string */
	public $bic;
}
