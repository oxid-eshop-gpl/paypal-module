<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

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
