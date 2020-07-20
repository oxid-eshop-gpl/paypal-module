<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The payment card to use to fund a payment. Card can be a credit or debit card.
 */
class CardResponse
{
	public $id;
	public $last_n_chars;
	public $last_digits;

	/** @var OxidProfessionalServices\PayPal\Api\Model\CardBrand */
	public $brand;
	public $type;
	public $issuer;
	public $bin;

	/** @var OxidProfessionalServices\PayPal\Api\Model\AuthenticationResponse */
	public $authentication_result;

	/** @var OxidProfessionalServices\PayPal\Api\Model\CardAttributesResponse */
	public $attributes;
}
