<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The name and address, typically used for billing and shipping purposes.
 */
class AddressName extends \AddressPortable
{
	/** @var string */
	public $addressee;
}
