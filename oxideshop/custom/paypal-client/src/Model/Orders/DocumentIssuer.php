<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The document-issuing authority information.
 */
class DocumentIssuer
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\CountryCode */
	public $country_code;
	public $province_code;
	public $authority;
}
