<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * A customer- or merchant-posted message for the dispute.
 */
class Message
{
	/** @var string */
	public $posted_by;

	/** @var string */
	public $time_posted;

	/** @var string */
	public $content;
}
