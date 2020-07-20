<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

/**
 * The eligible and ineligible disputes with reasons.
 */
class DisputeEligibilityResponse
{
	/** @var string */
	public $seller_transaction_id;

	/** @var string */
	public $buyer_transaction_id;

	/** @var array */
	public $eligible_dispute_reasons;

	/** @var array */
	public $ineligible_dispute_reasons;
}
