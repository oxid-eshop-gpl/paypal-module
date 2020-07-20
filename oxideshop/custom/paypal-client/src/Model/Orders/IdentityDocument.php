<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The identity document.
 */
class IdentityDocument
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\IdentityDocumentType */
	public $type;

	/** @var OxidProfessionalServices\PayPal\Api\Model\DocumentIssuer */
	public $issuer;
	public $id_number;

	/** @var OxidProfessionalServices\PayPal\Api\Model\DateNoTime */
	public $issued_date;

	/** @var OxidProfessionalServices\PayPal\Api\Model\DateNoTime */
	public $expiration_date;
}
