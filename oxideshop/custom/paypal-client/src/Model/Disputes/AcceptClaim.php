<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * A request by a merchant to accept a customer's merchandise claim.
 */
class AcceptClaim implements \JsonSerializable
{
	/** @var string */
	public $note;

	/** @var string */
	public $accept_claim_reason;

	/** @var string */
	public $invoice_id;

	/** @var AddressPortable */
	public $return_shipping_address;

	/** @var Money */
	public $refund_amount;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
