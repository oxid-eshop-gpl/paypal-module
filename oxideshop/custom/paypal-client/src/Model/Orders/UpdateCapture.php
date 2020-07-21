<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

class UpdateCapture
{
	/** @var string */
	public $id;

	/** @var string */
	public $status;

	/** @var CaptureStatusDetails */
	public $status_details;
}
