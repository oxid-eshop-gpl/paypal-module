<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Shipping details for transaction.
 */
class ShippingDetails implements \JsonSerializable
{
	/** @var AddressWithConfirmation */
	public $shipping_address;

	/** @var array */
	public $options;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
