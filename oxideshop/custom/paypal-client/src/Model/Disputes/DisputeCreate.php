<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The create dispute response.
 */
class DisputeCreate implements \JsonSerializable
{
	/** @var array */
	public $links;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
