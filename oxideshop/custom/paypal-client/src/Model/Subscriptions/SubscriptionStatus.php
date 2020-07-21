<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The subscription status details.
 */
class SubscriptionStatus
{
	/** @var string */
	public $status;

	/** @var string */
	public $status_change_note;

	/** @var string */
	public $status_update_time;

	/** @var string */
	public $status_changed_by;
}
