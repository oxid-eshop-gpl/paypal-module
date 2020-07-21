<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The pricing scheme details.
 */
class PricingScheme implements \JsonSerializable
{
	/** @var integer */
	public $version;

	/** @var string */
	public $status;

	/** @var Money */
	public $fixed_price;

	/** @var string */
	public $tier_mode;

	/** @var array */
	public $tiers;

	/** @var RollOutStrategy */
	public $roll_out_strategy;

	/** @var string */
	public $create_time;

	/** @var string */
	public $update_time;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
