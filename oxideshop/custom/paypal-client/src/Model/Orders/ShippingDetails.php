<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

class ShippingDetails
{
	/** @var Name */
	public $name;

	/** @var array */
	public $options;

	/** @var AddressPortable */
	public $address;
}
