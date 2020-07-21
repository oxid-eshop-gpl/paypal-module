<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Shipping details for transaction.
 */
class ShippingDetails
{
	/** @var AddressWithConfirmation */
	public $shipping_address;

	/** @var array */
	public $options;
}
