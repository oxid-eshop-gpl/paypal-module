<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The cancel dispute request details.
 */
class Cancel
{
	/** @var string */
	public $note;

	/** @var array */
	public $transaction_ids;

	/** @var string */
	public $cancellation_reason;
}
