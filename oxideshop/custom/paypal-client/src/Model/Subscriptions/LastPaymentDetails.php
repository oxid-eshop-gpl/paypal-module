<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The details for the last payment of the subscription.
 */
class LastPaymentDetails
{
	/** @var Money */
	public $amount;

	/** @var string */
	public $time;
}
