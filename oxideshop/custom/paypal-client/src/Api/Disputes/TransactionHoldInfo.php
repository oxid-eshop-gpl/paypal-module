<?php

namespace OxidProfessionalServices\PayPal\Api\Disputes;

class TransactionHoldInfo
{
	/** @var boolean */
	public $hold_required;

	/** @var string */
	public $id;

	/** @var string */
	public $reason;
}
