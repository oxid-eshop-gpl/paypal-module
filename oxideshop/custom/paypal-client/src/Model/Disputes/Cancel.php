<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The cancel dispute request details.
 */
class Cancel implements \JsonSerializable
{
	/** @var string */
	public $note;

	/** @var array */
	public $transaction_ids;

	/** @var string */
	public $cancellation_reason;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
