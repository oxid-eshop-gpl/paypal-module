<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The status fields for an authorized payment.
 */
class AuthorizationStatus
{
	public $status;

	/** @var OxidProfessionalServices\PayPal\Api\Model\AuthorizationStatusDetails */
	public $status_details;
}
