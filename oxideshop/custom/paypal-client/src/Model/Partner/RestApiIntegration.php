<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The integration details for PayPal REST endpoints.
 */
class RestApiIntegration
{
	/** @var string */
	public $integration_method;

	/** @var string */
	public $integration_type;

	/** @var string */
	public $seller_nonce;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Partner\FirstPartyDetails */
	public $FirstPartyDetails;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Partner\ThirdPartyDetails */
	public $ThirdPartyDetails;
}
