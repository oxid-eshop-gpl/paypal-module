<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

class DisputeSummaryInformation
{
	/** @var string */
	public $dispute_id;

	/** @var array */
	public $disputed_transactions;

	/** @var array */
	public $disputed_account_activities;

	/** @var string */
	public $external_reason_code;

	/** @var array */
	public $messages;

	/** @var array */
	public $evidences;

	/** @var array */
	public $history;

	/** @var array */
	public $partner_actions;

	/** @var array */
	public $supporting_info;

	/** @var array */
	public $links;
}
