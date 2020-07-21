<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * Information needed to pay using Multibanco.
 */
class MultibancoRequest
{
	/** @var string */
	public $name;

	/** @var string */
	public $country_code;
}
