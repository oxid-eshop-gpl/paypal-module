<?php

namespace OxidProfessionalServices\PayPal\Api\Disputes;

/**
 * The cancellation details.
 */
class CancellationDetails
{
	/** @var string */
	public $cancellation_number;

	/** @var boolean */
	public $cancelled;

	/** @var string */
	public $cancellation_mode;
}
