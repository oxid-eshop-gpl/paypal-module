<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The duplicate transaction details.
 */
class DuplicateTransaction
{
	/** @var boolean */
	public $received_duplicate;

	/** @var TransactionInfo */
	public $original_transaction;
}
