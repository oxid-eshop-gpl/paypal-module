<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * A captured payment.
 */
class UpdateCaptureRequest
{
	/** @var string */
	public $id;

	/** @var string */
	public $status;

	/** @var CaptureStatusDetails */
	public $status_details;
}
