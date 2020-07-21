<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The account identifier for a PayPal account.
 */
class AccountId implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
