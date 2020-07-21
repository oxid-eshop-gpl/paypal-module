<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The required operation to share data.
 */
class Operation
{
	/** @var string */
	public $operation;

	/** @var IntegrationDetails */
	public $api_integration_preference;

	/** @var BillingAgreement */
	public $billing_agreement;
}
