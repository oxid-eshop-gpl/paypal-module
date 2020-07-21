<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The recurring billing canceled details.
 */
class CanceledRecurringBilling
{
	/** @var Money */
	public $expected_refund;

	/** @var CancellationDetails */
	public $cancellation_details;
}
