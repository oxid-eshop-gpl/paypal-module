<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The subscription status details.
 */
class SubscriptionStatus implements \JsonSerializable
{
	/** @var string */
	public $status;

	/** @var string */
	public $status_change_note;

	/** @var string */
	public $status_update_time;

	/** @var string */
	public $status_changed_by;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
