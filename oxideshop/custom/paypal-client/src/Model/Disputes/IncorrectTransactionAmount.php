<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The incorrect transaction amount details.
 */
class IncorrectTransactionAmount
{
	/** @var Money */
	public $correct_transaction_amount;

	/** @var string */
	public $correct_transaction_time;
}
