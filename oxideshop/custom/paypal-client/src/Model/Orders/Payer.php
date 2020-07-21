<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The customer who approves and pays for the order. The customer is also known as the payer.
 */
class Payer
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Name */
	public $name;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Email */
	public $email_address;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\AccountId */
	public $payer_id;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\PhoneWithType */
	public $phone;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\DateNoTime */
	public $birth_date;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\TaxInfo */
	public $tax_info;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\AddressPortable */
	public $address;
}
