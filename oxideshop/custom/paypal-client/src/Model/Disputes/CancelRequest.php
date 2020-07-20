<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

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
