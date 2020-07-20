<?php

namespace OxidProfessionalServices\PayPal\Api\Partner;

/**
 * The details of the billing agreement between the partner and a seller.
 */
class BillingAgreement
{
	/** @var string */
	public $description;

	/** @var string */
	public $merchant_custom_data;

	/** @var string */
	public $approval_url;

	/** @var string */
	public $ec_token;
}
