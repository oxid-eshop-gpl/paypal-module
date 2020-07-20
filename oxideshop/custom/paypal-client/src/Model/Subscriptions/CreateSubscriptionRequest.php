<?php

namespace OxidProfessionalServices\PayPal\Model\Subscriptions;

/**
 * The create subscription request details.
 */
class CreateSubscriptionRequest
{
	/** @var string */
	public $plan_id;

	/** @var string */
	public $quantity;

	/** @var boolean */
	public $auto_renewal;
}
