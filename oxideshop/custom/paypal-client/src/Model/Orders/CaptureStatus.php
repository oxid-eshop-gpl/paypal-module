<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The status of a captured payment.
 */
class CaptureStatus
{
	/** @var string */
	public $status;

	/** @var CaptureStatusDetails */
	public $status_details;
}
