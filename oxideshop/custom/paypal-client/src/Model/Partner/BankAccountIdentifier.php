<?php

namespace OxidProfessionalServices\PayPal\Model\Partner;

/**
 * The bank account ID. An ID with `ROUTING_NUMBER_1` is required.
 */
class BankAccountIdentifier
{
	/** @var string */
	public $type;

	/** @var string */
	public $value;
}
