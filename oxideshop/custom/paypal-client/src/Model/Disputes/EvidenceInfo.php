<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The evidence-related information.
 */
class EvidenceInfo implements \JsonSerializable
{
	/** @var array */
	public $tracking_info;

	/** @var array */
	public $refund_ids;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
