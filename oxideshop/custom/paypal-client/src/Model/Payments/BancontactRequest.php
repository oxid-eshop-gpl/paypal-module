<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * Information needed to pay using Bancontact.
 */
class BancontactRequest
{
	/** @var string */
	public $name;

	/** @var string */
	public $country_code;
}
