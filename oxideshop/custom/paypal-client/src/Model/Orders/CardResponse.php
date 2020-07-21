<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The payment card to use to fund a payment. Card can be a credit or debit card.
 */
class CardResponse
{
	/** @var string */
	public $id;

	/** @var string */
	public $last_n_chars;

	/** @var string */
	public $last_digits;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\CardBrand */
	public $brand;

	/** @var string */
	public $type;

	/** @var string */
	public $issuer;

	/** @var string */
	public $bin;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\AuthenticationResponse */
	public $authentication_result;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\CardAttributesResponse */
	public $attributes;
}
