<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The details for the failed payment of the subscription.
 */
class FailedPaymentDetails implements \JsonSerializable
{
	/** @var Money */
	public $amount;

	/** @var string */
	public $time;

	/** @var string */
	public $reason_code;

	/** @var string */
	public $next_payment_retry_time;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
