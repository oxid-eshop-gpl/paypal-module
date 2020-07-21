<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Information about the parent transaction.
 */
class ParentTransaction implements \JsonSerializable
{
	/** @var string */
	public $id;

	/** @var string */
	public $type;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
