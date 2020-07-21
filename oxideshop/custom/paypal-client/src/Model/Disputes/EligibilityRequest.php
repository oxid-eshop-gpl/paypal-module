<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

class EligibilityRequest
{
	/** @var string */
	public $encrypted_transaction_id;

	/** @var string */
	public $dispute_id;

	/** @var string */
	public $buyer_note;
}
