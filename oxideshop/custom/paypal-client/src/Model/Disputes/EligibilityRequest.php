<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

/**
 * For a new case, lists the eligible and ineligible dispute reasons. For an existing dispute, lists the eligible and ineligible dispute reasons; the eligible reasons are the ones that the customer can use to update the dispute. To check the eligibility of case creation, specify the encrypted transaction ID. To check the eligibility of dispute reason modification, specify the dispute ID.
 */
class EligibilityRequest
{
	/** @var string */
	public $encrypted_transaction_id;

	/** @var string */
	public $dispute_id;

	/** @var string */
	public $buyer_note;
}
