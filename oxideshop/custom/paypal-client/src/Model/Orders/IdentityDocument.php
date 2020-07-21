<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The identity document.
 */
class IdentityDocument
{
	/** @var string */
	public $type;

	/** @var DocumentIssuer */
	public $issuer;

	/** @var string */
	public $id_number;

	/** @var string */
	public $issued_date;

	/** @var string */
	public $expiration_date;
}
