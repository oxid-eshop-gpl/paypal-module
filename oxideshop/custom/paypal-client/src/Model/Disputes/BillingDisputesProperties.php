<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The billing issue details.
 */
class BillingDisputesProperties
{
	/** @var DuplicateTransaction */
	public $duplicate_transaction;

	/** @var IncorrectTransactionAmount */
	public $incorrect_transaction_amount;

	/** @var PaymentByOtherMeans */
	public $payment_by_other_means;

	/** @var CreditNotProcessed */
	public $credit_not_processed;

	/** @var CanceledRecurringBilling */
	public $canceled_recurring_billing;
}
