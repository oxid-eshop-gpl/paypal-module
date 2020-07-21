<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

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
