<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The update pricing scheme request details.
 */
class UpdatePricingSchemeRequest implements \JsonSerializable
{
	/** @var integer */
	public $billing_cycle_sequence;

	/** @var PricingScheme */
	public $pricing_scheme;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
