<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * A request to change the reason for a dispute.
 */
class ChangeReason
{
	/** @var string */
	public $reason;

	/** @var string */
	public $note;

	/** @var Extensions */
	public $extensions;

	/** @var array */
	public $disputed_account_activities;

	/** @var array */
	public $transaction_ids;

	/** @var Money */
	public $buyer_requested_amount;

	/** @var array */
	public $item_info;
}
