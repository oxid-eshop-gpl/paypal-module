<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

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
