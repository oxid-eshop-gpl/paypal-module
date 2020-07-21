<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

class UpdateAuthorization
{
	/** @var string */
	public $id;

	/** @var string */
	public $status;

	/** @var AuthorizationStatusDetails */
	public $status_details;
}
