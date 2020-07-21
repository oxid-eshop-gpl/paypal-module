<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The customer's funding instrument. Returned as a funding option to external entities.
 */
class FundingInstrumentResponse
{
	/** @var CardResponse */
	public $card;

	/** @var BankAccountResponse */
	public $bank_account;

	/** @var PaypalCredit */
	public $credit;
}
