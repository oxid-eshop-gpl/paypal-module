<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The authorized payment transaction.
 */
class UpdateAuthorizationRequest implements \JsonSerializable
{
	/** @var string */
	public $id;

	/** @var string */
	public $status;

	/** @var AuthorizationStatusDetails */
	public $status_details;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
