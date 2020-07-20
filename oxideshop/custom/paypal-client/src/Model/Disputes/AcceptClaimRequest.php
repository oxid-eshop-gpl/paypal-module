<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

/**
 * A request by a merchant to accept a customer's merchandise claim.
 */
class AcceptClaimRequest
{
	/** @var string */
	public $note;

	/** @var string */
	public $accept_claim_reason;

	/** @var string */
	public $invoice_id;
}
