<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The document-issuing authority information.
 */
class DocumentIssuer
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\CountryCode */
	public $country_code;

	/** @var string */
	public $province_code;

	/** @var string */
	public $authority;
}
