<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The phone information.
 */
class PhoneWithType
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\PhoneType */
	public $phone_type;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Phone */
	public $phone_number;
}
