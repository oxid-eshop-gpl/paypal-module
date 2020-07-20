<?php

namespace OxidProfessionalServices\PayPal\Api\Disputes;

/**
 * The customer-entered issue details for an unauthorized dispute.
 */
class UnauthorizedDisputeProperties
{
	/** @var boolean */
	public $password_changed;

	/** @var boolean */
	public $pin_changed;

	/** @var boolean */
	public $security_questions_changed;

	/** @var array */
	public $rejected_dispute_transactions;
}
