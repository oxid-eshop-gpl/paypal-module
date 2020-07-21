<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The pricing tier details.
 */
class PricingTier
{
	/** @var string */
	public $starting_quantity;

	/** @var string */
	public $ending_quantity;

	/** @var Money */
	public $amount;
}
