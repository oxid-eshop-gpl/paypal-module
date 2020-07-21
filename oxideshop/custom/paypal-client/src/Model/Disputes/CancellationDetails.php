<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

class CancellationDetails
{
	/** @var string */
	public $cancellation_number;

	/** @var boolean */
	public $cancelled;

	/** @var string */
	public $cancellation_mode;
}
