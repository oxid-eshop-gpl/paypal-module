<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The payment source used to fund the payment.
 */
class PaymentSourceResponse implements \JsonSerializable
{
	/** @var CardResponseWithBillingAddress */
	public $card;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
