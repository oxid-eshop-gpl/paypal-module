<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

class CancelRequest
{
	/** @var string */
	public $note;

	/** @var array */
	public $transaction_ids;

	/** @var string */
	public $cancellation_reason;
}
