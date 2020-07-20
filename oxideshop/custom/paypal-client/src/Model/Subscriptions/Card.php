<?php

namespace OxidProfessionalServices\PayPal\Model\Subscriptions;

/**
 * The payment card to use to fund a payment. Can be a credit or debit card.
 */
class Card
{
	/** @var string */
	public $id;

	/** @var string */
	public $name;

	/** @var string */
	public $number;

	/** @var string */
	public $security_code;

	/** @var string */
	public $last_digits;

	/** @var array */
	public $authentication_results;
}
