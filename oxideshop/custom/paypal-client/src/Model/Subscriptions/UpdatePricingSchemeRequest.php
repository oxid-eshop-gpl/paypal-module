<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The update pricing scheme request details.
 */
class UpdatePricingSchemeRequest
{
	/** @var integer */
	public $billing_cycle_sequence;

	/** @var PricingScheme */
	public $pricing_scheme;
}
