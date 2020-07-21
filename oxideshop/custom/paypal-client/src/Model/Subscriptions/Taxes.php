<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The tax details.
 */
class Taxes implements \JsonSerializable
{
	/** @var string */
	public $percentage;

	/** @var boolean */
	public $inclusive;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
