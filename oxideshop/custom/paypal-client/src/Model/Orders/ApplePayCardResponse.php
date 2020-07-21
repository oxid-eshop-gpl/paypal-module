<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The Card from Apple Pay Wallet used to fund the payment
 */
class ApplePayCardResponse extends \CardResponse
{
	/** @var string */
	public $name;

	/** @var AddressPortable */
	public $billing_address;

	/** @var string */
	public $country_code;
}
