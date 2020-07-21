<?php

namespace OxidProfessionalServices\PayPal\Model\Subscriptions;

/**
 * The roll-out strategy for a pricing scheme update. After the pricing update, all new subscriptions are based on this pricing scheme and the values in this object determine the behavior for the existing subscriptions.
 */
class RolloutStrategyforPricingSchemeChange
{
	/** @var string */
	public $process_change_from;
}
