<?php

namespace OxidProfessionalServices\PayPal\Api\Disputes;

/**
 * The outcome of a dispute.
 */
class DisputeOutcome
{
	/** @var string */
	public $outcome_code;

	/** @var string */
	public $outcome_reason;
}
