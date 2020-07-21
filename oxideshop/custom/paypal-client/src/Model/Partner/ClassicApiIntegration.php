<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The integration details for PayPal CLASSIC endpoints.
 */
class ClassicApiIntegration
{
	/** @var string */
	public $integration_type;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Partner\ThirdPartyDetails */
	public $ThirdPartyDetails;

	/** @var string */
	public $first_party_details;
}
