<?php

namespace OxidProfessionalServices\PayPal\Api\Disputes;

/**
 * A request to change the reason for a dispute.
 */
class ChangeReasonRequest
{
	/** @var string */
	public $note;

	/** @var array */
	public $disputed_account_activities;

	/** @var array */
	public $transaction_ids;

	/** @var array */
	public $item_info;
}
