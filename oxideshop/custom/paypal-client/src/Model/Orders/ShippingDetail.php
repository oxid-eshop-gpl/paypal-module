<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The shipping details.
 */
class ShippingDetail
{
	/** @var Name */
	public $name;

	/** @var array */
	public $options;

	/** @var AddressPortable */
	public $address;
}
