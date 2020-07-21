<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Participant in a payment activity, one of person or business must be provided.
 */
class Participant extends \Account implements \JsonSerializable
{
	/** @var Person */
	public $person;

	/** @var Business */
	public $business;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
