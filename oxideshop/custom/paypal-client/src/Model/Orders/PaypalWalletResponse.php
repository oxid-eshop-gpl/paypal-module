<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The Paypal Wallet response.
 */
class PaypalWalletResponse implements \JsonSerializable
{
	/** @var PaypalWalletAttributesResponse */
	public $attributes;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
