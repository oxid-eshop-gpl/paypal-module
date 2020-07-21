<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The API caller-provided information about the store.
 */
class PointOfSale implements \JsonSerializable
{
	/** @var string */
	public $store_id;

	/** @var string */
	public $terminal_id;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
