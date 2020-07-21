<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The details about the partner dispute.
 */
class ReferenceDispute implements \JsonSerializable
{
	/** @var string */
	public $id;

	/** @var string */
	public $create_time;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
