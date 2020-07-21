<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The bank account ID. An ID with `ROUTING_NUMBER_1` is required.
 */
class Identifier
{
	/** @var string */
	public $type;

	/** @var string */
	public $value;
}
