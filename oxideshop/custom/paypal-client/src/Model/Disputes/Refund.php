<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The refund details.
 */
class Refund implements \JsonSerializable
{
	/** @var Money */
	public $gross_amount;

	/** @var string */
	public $transaction_time;

	/** @var string */
	public $transaction_id;

	/** @var string */
	public $invoice_number;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
