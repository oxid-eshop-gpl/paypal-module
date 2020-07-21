<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The instruction to process an order.
 */
class ProcessingInstruction implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
