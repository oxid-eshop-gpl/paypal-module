<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The payment card to use to fund a payment. Can be a credit or debit card.
 */
class Card
{
	public $id;
	public $name;
	public $number;

	/** @var OxidProfessionalServices\PayPal\Api\Model\DateYearMonth */
	public $expiry;
	public $security_code;
	public $last_digits;

	/** @var OxidProfessionalServices\PayPal\Api\Model\CardBrand */
	public $card_type;

	/** @var OxidProfessionalServices\PayPal\Api\Model\AddressPortable */
	public $billing_address;
	public $authentication_results;

	/** @var OxidProfessionalServices\PayPal\Api\Model\CardAttributes */
	public $attributes;
}
