<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The authorized payment transaction.
 */
class UpdateAuthorizationRequest
{
	/** @var string */
	public $id;

	/** @var string */
	public $status;

	/** @var AuthorizationStatusDetails */
	public $status_details;
}
