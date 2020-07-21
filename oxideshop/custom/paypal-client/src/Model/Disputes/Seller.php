<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The details for the merchant who receives the funds and fulfills the order. For example, merchant ID, and contact email address.
 */
class Seller implements \JsonSerializable
{
	/** @var string */
	public $email;

	/** @var string */
	public $merchant_id;

	/** @var string */
	public $name;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
