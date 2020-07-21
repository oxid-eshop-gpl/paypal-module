<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * Universal Cardholder Authentication Field (UCAF) Indicator value provided by the issuer.
 */
class UcafIndicator implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
