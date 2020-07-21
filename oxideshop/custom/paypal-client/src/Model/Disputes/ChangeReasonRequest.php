<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

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
