<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The customer who approves and pays for the order. The customer is also known as the payer.
 */
class Payer
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Name */
	public $name;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Email */
	public $email_address;

	/** @var OxidProfessionalServices\PayPal\Api\Model\AccountId */
	public $payer_id;

	/** @var OxidProfessionalServices\PayPal\Api\Model\PhoneWithType */
	public $phone;

	/** @var OxidProfessionalServices\PayPal\Api\Model\DateNoTime */
	public $birth_date;

	/** @var OxidProfessionalServices\PayPal\Api\Model\TaxInfo */
	public $tax_info;

	/** @var OxidProfessionalServices\PayPal\Api\Model\AddressPortable */
	public $address;
}
