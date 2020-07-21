<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * A merchant request to escalate a dispute, by ID, to a PayPal claim.
 */
class Escalate implements \JsonSerializable
{
	/** @var string */
	public $note;

	/** @var string */
	public $buyer_escalation_reason;

	/** @var Money */
	public $buyer_requested_amount;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
