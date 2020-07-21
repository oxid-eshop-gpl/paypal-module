<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The suspend subscription request details.
 */
class SubscriptionSuspendRequest implements \JsonSerializable
{
	/** @var string */
	public $reason;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
