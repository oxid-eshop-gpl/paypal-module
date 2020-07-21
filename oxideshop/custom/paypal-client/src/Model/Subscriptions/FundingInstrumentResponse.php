<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The customer's funding instrument. Returned as a funding option to external entities.
 */
class FundingInstrumentResponse implements \JsonSerializable
{
	/** @var CardResponse */
	public $card;

	/** @var BankAccountResponse */
	public $bank_account;

	/** @var PaypalCredit */
	public $credit;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
