<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

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
