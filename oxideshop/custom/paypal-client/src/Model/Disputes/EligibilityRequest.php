<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * For a new third-party case, lists the eligible and ineligible dispute reasons. The customer can use the eligible reasons to create a dispute. To check the eligibility of case creation, specify the encrypted transaction ID.
 */
class EligibilityRequest
{
	/** @var string */
	public $transaction_id;

	/** @var array */
	public $disputed_items;
}
