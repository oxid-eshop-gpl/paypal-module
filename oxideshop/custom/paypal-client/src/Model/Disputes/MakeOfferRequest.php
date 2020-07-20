<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

/**
 * A merchant request to make an offer to resolve a dispute.
 */
class MakeOfferRequest
{
	/** @var string */
	public $note;

	/** @var string */
	public $invoice_id;
}
