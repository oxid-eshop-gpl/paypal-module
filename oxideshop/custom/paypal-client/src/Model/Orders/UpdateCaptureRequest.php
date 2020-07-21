<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * A captured payment.
 */
class UpdateCaptureRequest implements \JsonSerializable
{
	/** @var string */
	public $id;

	/** @var string */
	public $status;

	/** @var CaptureStatusDetails */
	public $status_details;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
