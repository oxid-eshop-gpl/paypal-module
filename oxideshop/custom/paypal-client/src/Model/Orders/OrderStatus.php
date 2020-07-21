<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The order status.
 */
class OrderStatus implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
