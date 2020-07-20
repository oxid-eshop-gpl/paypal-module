<?php

namespace OxidProfessionalServices\PayPal\Api\Subscriptions;

/**
 * The pricing scheme details.
 */
class PricingScheme
{
	/** @var integer */
	public $version;

	/** @var string */
	public $status;

	/** @var string */
	public $tier_mode;

	/** @var array */
	public $tiers;
}
