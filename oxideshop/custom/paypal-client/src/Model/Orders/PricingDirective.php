<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Pricing directive for transaction indication the source and type of pricing.
 */
class PricingDirective
{
	/** @var string */
	public $participant_type;

	/** @var string */
	public $account_number;

	/** @var string */
	public $type;
}
