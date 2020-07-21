<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The merchant-preferred payment methods.
 */
class PayeePaymentMethodPreference implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
