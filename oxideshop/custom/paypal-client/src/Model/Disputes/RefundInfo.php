<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The payout details for the referred dispute.
 */
class RefundInfo
{
	/** @var string */
	public $recipient;

	/** @var Money */
	public $amount;

	/** @var string */
	public $create_time;

	/** @var string */
	public $transaction_id;

	/** @var string */
	public $payout_type;

	/** @var boolean */
	public $seller_protection_eligible;

	/** @var string */
	public $transaction_source;
}
