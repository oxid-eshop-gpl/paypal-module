<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

/**
 * A merchant request to escalate a dispute, by ID, to a PayPal claim.
 */
class EscalateClaimRequest
{
	/** @var string */
	public $note;

	/** @var string */
	public $buyer_escalation_reason;
}
