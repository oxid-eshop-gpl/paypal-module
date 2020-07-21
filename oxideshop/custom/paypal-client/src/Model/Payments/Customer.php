<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The details about a customer in merchant's or partner's system of records.
 */
class Customer implements \JsonSerializable
{
	/** @var string */
	public $id;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
