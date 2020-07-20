<?php

namespace OxidProfessionalServices\PayPal\Api\Subscriptions;

/**
 * The application context, which customizes the payer experience during the subscription approval process with PayPal.
 */
class ApplicationContext
{
	/** @var string */
	public $brand_name;

	/** @var string */
	public $shipping_preference;

	/** @var string */
	public $user_action;

	/** @var string */
	public $return_url;

	/** @var string */
	public $cancel_url;
}
