<?php

namespace OxidProfessionalServices\PayPal\Api\Disputes;

/**
 * The cancel dispute request details.
 */
class CancelRequest
{
	/** @var string */
	public $note;

	/** @var array */
	public $transaction_ids;

	/** @var string */
	public $cancellation_reason;
}
