<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The details for the last payment of the subscription.
 */
class LastPaymentDetails implements \JsonSerializable
{
	/** @var Money */
	public $amount;

	/** @var string */
	public $time;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
