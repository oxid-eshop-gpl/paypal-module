<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

/**
 * The information about the disputed transaction.
 */
class TransactionInformation
{
	/** @var string */
	public $buyer_transaction_id;

	/** @var string */
	public $seller_transaction_id;

	/** @var string */
	public $transaction_status;

	/** @var string */
	public $invoice_number;

	/** @var string */
	public $custom;

	/** @var array */
	public $items;

	/** @var boolean */
	public $seller_protection_eligible;

	/** @var string */
	public $seller_protection_type;

	/** @var string */
	public $provisional_credit_status;
}
