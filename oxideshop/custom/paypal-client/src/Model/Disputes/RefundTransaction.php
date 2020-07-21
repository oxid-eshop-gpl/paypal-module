<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The refund transaction.
 */
class RefundTransaction implements \JsonSerializable
{
	/** @var string */
	public $id;

	/** @var string */
	public $status;

	/** @var Money */
	public $gross_amount;

	/** @var string */
	public $create_time;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
