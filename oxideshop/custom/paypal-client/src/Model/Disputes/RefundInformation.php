<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

class RefundInformation
{
	/** @var string */
	public $recipient;

	/** @var string */
	public $transaction_id;

	/** @var string */
	public $payout_type;

	/** @var boolean */
	public $seller_protection_eligible;

	/** @var string */
	public $transaction_source;
}
