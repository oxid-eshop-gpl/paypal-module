<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Business identification details.
 */
class BusinessIdentification
{
	/** @var string */
	public $type;

	/** @var string */
	public $identifier;

	/** @var DocumentIssuer */
	public $issuer;

	/** @var string */
	public $issued_time;
}
