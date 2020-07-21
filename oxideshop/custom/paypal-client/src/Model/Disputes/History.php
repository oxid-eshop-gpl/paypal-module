<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The history of the dispute.
 */
class History
{
	/** @var string */
	public $date;

	/** @var string */
	public $actor;

	/** @var string */
	public $event_type;
}
