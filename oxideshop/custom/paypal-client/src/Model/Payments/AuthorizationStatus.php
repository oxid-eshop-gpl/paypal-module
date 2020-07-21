<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The status fields for an authorized payment.
 */
class AuthorizationStatus
{
	/** @var string */
	public $status;

	/** @var AuthorizationStatusDetails */
	public $status_details;
}
