<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * A customer request to deny the offer made by the merchant.
 */
class DenyOffer implements \JsonSerializable
{
	/** @var string */
	public $note;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
