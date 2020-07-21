<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The transaction for which to create a case.
 */
class Transaction
{
	/** @var string */
	public $id;

	/** @var array */
	public $items;

	/** @var string */
	public $status;

	/** @var Money */
	public $gross_amount;

	/** @var string */
	public $create_time;
}
