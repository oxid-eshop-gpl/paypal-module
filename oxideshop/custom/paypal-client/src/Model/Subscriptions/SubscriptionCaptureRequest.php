<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The charge amount from the subscriber.
 */
class SubscriptionCaptureRequest
{
	/** @var string */
	public $note;

	/** @var string */
	public $capture_type;

	/** @var Money */
	public $amount;
}
