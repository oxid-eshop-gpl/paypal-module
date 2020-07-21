<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The charge amount from the subscriber.
 */
class SubscriptionCaptureRequest implements \JsonSerializable
{
	/** @var string */
	public $note;

	/** @var string */
	public $capture_type;

	/** @var Money */
	public $amount;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
