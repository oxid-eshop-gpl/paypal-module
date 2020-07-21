<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The status fields for an authorized payment.
 */
class AuthorizationStatus implements \JsonSerializable
{
	/** @var string */
	public $status;

	/** @var AuthorizationStatusDetails */
	public $status_details;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
