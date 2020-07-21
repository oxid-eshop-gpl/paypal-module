<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The pricing tier details.
 */
class PricingTier implements \JsonSerializable
{
	/** @var string */
	public $starting_quantity;

	/** @var string */
	public $ending_quantity;

	/** @var Money */
	public $amount;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
