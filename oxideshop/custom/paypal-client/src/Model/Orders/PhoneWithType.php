<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The phone information.
 */
class PhoneWithType
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\PhoneType */
	public $phone_type;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Phone */
	public $phone_number;
}
