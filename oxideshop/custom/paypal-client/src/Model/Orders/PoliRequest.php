<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information needed to pay using POLi.
 */
class PoliRequest
{
	/** @var string */
	public $name;

	/** @var string */
	public $country_code;
}
