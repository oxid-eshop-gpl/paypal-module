<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The change reason response.
 */
class DisputesChangeReason implements \JsonSerializable
{
	/** @var array */
	public $links;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
