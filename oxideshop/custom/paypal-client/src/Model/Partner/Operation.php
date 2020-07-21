<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The required operation to share data.
 */
class Operation implements \JsonSerializable
{
	/** @var string */
	public $operation;

	/** @var IntegrationDetails */
	public $api_integration_preference;

	/** @var BillingAgreement */
	public $billing_agreement;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
