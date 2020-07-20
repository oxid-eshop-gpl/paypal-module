<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The status of a captured payment.
 */
class CaptureStatus
{
	public $status;

	/** @var OxidProfessionalServices\PayPal\Api\Model\CaptureStatusDetails */
	public $status_details;
}
