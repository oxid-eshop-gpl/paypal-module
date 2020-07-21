<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The details of the captured payment status.
 */
class CaptureStatusDetails implements \JsonSerializable
{
	/** @var string */
	public $reason;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
