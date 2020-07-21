<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The computed metrics for disputes.
 */
class Metrics implements \JsonSerializable
{
	/** @var array */
	public $metrics;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
