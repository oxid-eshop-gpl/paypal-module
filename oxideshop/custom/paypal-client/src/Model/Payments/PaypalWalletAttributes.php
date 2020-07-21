<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * Additional attributes associated with the use of this paypal wallet
 */
class PaypalWalletAttributes implements \JsonSerializable
{
	/** @var Customer */
	public $customer;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
