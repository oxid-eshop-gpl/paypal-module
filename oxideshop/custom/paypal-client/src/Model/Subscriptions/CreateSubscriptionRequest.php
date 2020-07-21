<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

class CreateSubscriptionRequest
{
	/** @var string */
	public $plan_id;

	/** @var string */
	public $quantity;

	/** @var boolean */
	public $auto_renewal;
}
