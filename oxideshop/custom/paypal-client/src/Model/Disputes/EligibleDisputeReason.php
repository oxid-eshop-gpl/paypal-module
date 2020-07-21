<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The eligible dispute reason.
 */
class EligibleDisputeReason implements \JsonSerializable
{
	/** @var string */
	public $dispute_reason;

	/** @var string */
	public $stage;

	/** @var string */
	public $reason;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Disputes\AllowableLifeCycle */
	public $AllowableLifeCycle;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
