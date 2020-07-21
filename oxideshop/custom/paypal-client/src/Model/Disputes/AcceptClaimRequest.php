<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

class AcceptClaimRequest
{
	/** @var string */
	public $note;

	/** @var string */
	public $accept_claim_reason;

	/** @var string */
	public $invoice_id;
}
