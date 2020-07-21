<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The activate subscription request details.
 */
class SubscriptionActivateRequest implements \JsonSerializable
{
	/** @var string */
	public $reason;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
