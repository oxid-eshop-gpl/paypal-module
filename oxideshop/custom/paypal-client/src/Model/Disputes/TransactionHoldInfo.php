<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

class TransactionHoldInfo
{
	/** @var boolean */
	public $hold_required;

	/** @var string */
	public $id;

	/** @var string */
	public $reason;
}
