<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The integration details for the partner and customer relationship. Required if `operation` is `API_INTEGRATION`.
 */
class IntegrationDetails
{
	/** @var ClassicApiIntegration */
	public $classic_api_integration;

	/** @var RestApiIntegration */
	public $rest_api_integration;
}
