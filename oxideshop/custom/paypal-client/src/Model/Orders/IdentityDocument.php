<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The identity document.
 */
class IdentityDocument
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\IdentityDocumentType */
	public $type;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\DocumentIssuer */
	public $issuer;

	/** @var string */
	public $id_number;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\DateNoTime */
	public $issued_date;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\DateNoTime */
	public $expiration_date;
}
