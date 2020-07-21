<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

class EscalateClaimRequest
{
	/** @var string */
	public $note;

	/** @var string */
	public $buyer_escalation_reason;
}
