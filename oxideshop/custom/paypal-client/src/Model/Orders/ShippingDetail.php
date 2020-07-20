<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The shipping details.
 */
class ShippingDetail
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Name */
	public $name;
	public $options;

	/** @var OxidProfessionalServices\PayPal\Api\Model\AddressPortable */
	public $address;
}
