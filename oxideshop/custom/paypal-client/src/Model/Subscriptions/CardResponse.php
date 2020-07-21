<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

class CardResponse
{
	/** @var string */
	public $id;

	/** @var string */
	public $last_n_chars;

	/** @var string */
	public $last_digits;

	/** @var string */
	public $type;

	/** @var string */
	public $issuer;

	/** @var string */
	public $bin;
}
