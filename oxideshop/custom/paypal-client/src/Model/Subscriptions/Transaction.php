<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The transaction details.
 */
class Transaction extends \CaptureStatus
{
	/** @var string */
	public $id;

	/** @var AmountWithBreakdown */
	public $amount_with_breakdown;

	/** @var Name */
	public $payer_name;

	/** @var string */
	public $payer_email;

	/** @var string */
	public $time;
}
