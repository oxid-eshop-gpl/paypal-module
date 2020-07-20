<?php

namespace OxidProfessionalServices\PayPal\Api\Partner;

/**
 * The preference that customizes the billing experience of the customer.
 */
class BillingExperiencePreference
{
	/** @var string */
	public $experience_id;

	/** @var boolean */
	public $billing_context_set;
}
