<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

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
